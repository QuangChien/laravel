<?php

namespace App\Http\Controllers\Backend\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{   
    private $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function index(){
        $comments = $this->comment->latest()->paginate(5);
        return  view('backend.comments.listcomment', compact('comments'));
    }

    public function update($id){
        $this->comment->find($id)->update([
            'status' => 1,
        ]);
        
        return redirect()->route('comment.index');
    }

    public function delete($id){
        try {
            $this->comment->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }

    
}
