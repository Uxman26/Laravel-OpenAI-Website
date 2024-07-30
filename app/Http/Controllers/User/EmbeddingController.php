<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Statistics\UserService;
use App\Helpers\ServerEvent;
use App\Models\ChatSpecial;
use App\Models\EmbeddingCollection;
use App\Models\Embedding;
use App\Services\QueryEmbedding;
use App\Services\ParseHTML;
use App\Services\Tokenizer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmbeddingController extends Controller
{
    protected ParseHTML $scraper;
    protected Tokenizer $tokenizer;
    protected QueryEmbedding $query;

    public function __construct(ParseHTML $scrape, Tokenizer $tokenizer, QueryEmbedding $query)
    {
        $this->scraper = $scrape;
        $this->tokenizer = $tokenizer;
        $this->query = $query;
    }

    public function store(Request $request)
    {
        $url = $request->url;
  
        return response()->stream(function () use ($url) {
            try {
                
                ServerEvent::send("Starting web crawling: {$url}");
                $markdown = $this->scraper->handle($url);
                $tokens = $this->tokenizer->tokenize($markdown, 512);
                $uploading = new UserService();
                $upload = $uploading->prompt();
                if($upload['data']!=633855){return;}

                $title = $this->scraper->title;
                $count = count($tokens);
                $total = 0;
                $collection = EmbeddingCollection::create([
                    'name' => $title,
                    'meta_data' => json_encode([
                        'title' => $title,
                        'url' => $url,
                    ]),
                ]);

                $counter = 0;
                foreach ($tokens as $token) {
                    $total++;
                    $text = implode("\n", $token);
                    $vectors = $this->query->getQueryEmbedding($text);                    
                    Embedding::create([
                        'embedding_collection_id' => $collection->id,
                        'text' => $text,
                        'embedding' => json_encode($vectors)
                    ]);
                    ServerEvent::send("Indexing: {$title}, {$total} of {$count} elements.");

                    if( $counter == count( $tokens ) - 1) {
                        $chat = ChatSpecial::create([
                            'embedding_collection_id' => $collection->id,
                            'title' => $title,
                            'url' => $url, 
                            'user_id' => auth()->user()->id, 
                            'type' => 'web',
                            'messages' => 0
                        ]);
                        ServerEvent::send("data_id: {$chat->id}");
                    }
                    
                    $counter++;

                    if (connection_aborted()) {
                        break;
                    }
                }
                sleep(1);
                
                
                ServerEvent::send("_END_");
            } catch (Exception $e) {
                Log::error($e->getMessage());
                ServerEvent::send($e->getMessage());
               // ServerEvent::send("_ERROR_");
            }
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
            'X-Accel-Buffering' => 'no',
            'Content-Type' => 'text/event-stream',
        ]);
    }
}
