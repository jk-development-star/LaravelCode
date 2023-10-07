<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\EmailTemplate;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\GeneralSetting;
use App\Models\PageBlogItem;
use Illuminate\Http\Request;
use DB;
use App\Mail\CommentMessageToAdmin;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index() {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $blog = PageBlogItem::where('id', 1)->first();

        $blog_items = Blog::with('rCategory')
            ->orderby('id', 'desc')
            ->paginate(9);

        $blog_items_no_pagi = Blog::orderby('id', 'desc')->get();
        $categories = Category::get();
        return view('front.blogs', compact('blog','g_setting','blog_items','blog_items_no_pagi','categories'));
    }

    public function detail($slug) {
        $g_setting = GeneralSetting::where('id', 1)->first();

        $blog = PageBlogItem::where('id', 1)->first();

        $blog_detail = Blog::with('rCategory')
            ->where('post_slug', $slug)
            ->first();

        $blog_items = Blog::get();
        $blog_items_no_pagi = Blog::orderby('id', 'desc')->get();
        $categories = Category::get();
        if(!$blog_detail) {
            return abort(404);
        }
        $comments = '';
        $comments = Comment::where('blog_id', $blog_detail->id)->where('comment_status', 'Approved')->get();
        return view('front.post', compact('g_setting','blog','blog_detail','blog_items','blog_items_no_pagi','categories','comments'));
    }

    public function comment(Request $request) {
        $comment = new Comment();
        $data = $request->only($comment->getFillable());

        $request->validate([
                'person_name' => 'required',
                'person_email' => 'required|email',
                'person_comment' => 'required'
        ],
        [
            'person_name.required' => ERR_NAME_REQUIRED,
            'person_email.required' => ERR_EMAIL_REQUIRED,
            'person_email.email' => ERR_EMAIL_INVALID,
            'person_comment.required' => ERR_COMMENT_REQUIRED
        ]);
        $comment->fill($data)->save();

        // Send email to admin
        $email_template_data = EmailTemplate::where('id', 2)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $comment_see_url = route('admin_comment_pending');

        $message = str_replace('[[person_name]]', $request->person_name, $message);
        $message = str_replace('[[person_email]]', $request->person_email, $message);
        $message = str_replace('[[person_comment]]', $request->person_comment, $message);
        $message = str_replace('[[comment_see_url]]', $comment_see_url, $message);

        $admin_data = Admin::where('id',1)->first();

        Mail::to($admin_data->email)->send(new CommentMessageToAdmin($subject,$message));
        return redirect()->back()->with('success', SUCCESS_BLOG_COMMENT);
    }
}
