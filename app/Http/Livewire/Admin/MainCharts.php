<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class MainCharts extends Component
{

    public $Published, $unPublished;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {  
        $countPublished = count(Post::where('status', 1)->select('id')->get());
        $countunPublished = count(Post::where('status', 0)->select('id')->get());

        $data = DB::table('posts')
            ->selectRaw('sum(views) As views, sum(likes) As likes')->groupByRaw('Month(created_at)')->get();

        $label = Post::where('status', 1)->select('id', 'created_at')->get()->groupBy(function($data) {
            return Carbon::parse($data->created_at)->format('Y-M');
        });

        $months = [];
        $monthCount = [];
        foreach ($label as $month=>$values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }

        $views = $data->pluck('views');
        $likes = $data->pluck('likes');

        return view('livewire.admin.main-charts', [
             'views' => $views, 'likes' => $likes, 'months' => $months,  'countPublished' => $countPublished, 'countunPublished' => $countunPublished  

        ]);
    }
}
