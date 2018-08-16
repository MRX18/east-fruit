<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Image extends Model
{
    use \KodiComponents\Support\Upload;

    protected $casts = [
        'pdf' => 'file', // or file | upload
    ];

    public function images($count) {
        $_controller = new Controller();

        $date = Carbon::now()->toDateTimeString();

    	$iamges = $this->where('datetime','<=', $date)->orderByDesc('datetime')->paginate($count);

        return $_controller->dateCatigor($iamges);
    }

    public function imageArticle($id) {
        $_controller = new Controller();

        $article = $this->where('id', $id)->first();
        $article->date = $_controller->dateFirst($article->date);

    	return $article;
    }
}
