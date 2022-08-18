<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiveFeeds;
use App\Models\SubMenus;
use App\Models\Menus;
use App\Models\Articles;
use Illuminate\Support\Facades\DB;

class LiveFeedsController extends Controller
{
    function getLiveFeeds(){
       
        $select = DB::table('mwp_live_feeds')
        ->join('mwp_sub_menus', 'mwp_live_feeds.category_id', '=', 'mwp_sub_menus.id')
        ->join('mwp_menus', 'mwp_sub_menus.menu_under', '=', 'mwp_menus.id')
        ->select('mwp_live_feeds.*', 'mwp_sub_menus.sub_menu_name', 'mwp_menus.menu_name')
        ->orderBy('created_at','DESC')
        ->orderBy('id','DESC')
        ->get();

        return $select;

    }
     function getList(){
        $article = Articles::firstWhere('id', 29605);
        $highlight = Articles::join('mwp_articles_live_feeds','mwp_articles.id','=','mwp_articles_live_feeds.article_id')
        ->orderBy('article_updated')
        ->take(5)
        ->get();
        $art_live_feeds =  DB::table('mwp_articles_live_feeds')
                -> join('mwp_articles','mwp_articles_live_feeds.article_id','=','mwp_articles.id')
                -> select('mwp_articles_live_feeds.*','mwp_articles.*')
                ->orderBy('mwp_articles_live_feeds.id','DESC')
                ->get();
        $lf_feeds = LiveFeeds::firstWhere('category_id',$article['sub_menu_under']);
        $shareButtons = \Share::page(
            'https://www.bollywoodshaadis.com/'
      )
      ->facebook()
      ->whatsapp();
$IMAGE_PATH = "https://www.bollywoodshaadis.com/img/";
return view('welcome')->with('live_feeds',$art_live_feeds)->with('lf_feed',$lf_feeds)->with('shareButtons',$shareButtons )->with('article',$article)->with("highlights", $highlight)->with("IMAGE_PATH", $IMAGE_PATH);
    }
     function getArticle($id,$cat){
        $article = Articles::firstWhere('id', $id);
        if($cat!=18 && $cat!=9){
            $highlight = Articles::where('sub_menu_under', '=', 19)
            -> join('mwp_articles_live_feeds','mwp_articles.id','=','mwp_articles_live_feeds.article_id')
            ->orWhere('sub_menu_under', '=', 9)
            ->orderBy('article_updated')
            ->take(5)
            ->get();
        }else if($cat==18 && $cat!=9){
            $highlight = Articles::where('sub_menu_under', '=', 34)
            -> join('mwp_articles_live_feeds','mwp_articles.id','=','mwp_articles_live_feeds.article_id')
            ->orWhere('sub_menu_under', '=', 9)
            ->orderBy('article_updated')
            ->take(5)
            ->get();
        }else if($cat!=18 && $cat==9){
            $highlight = Articles::where('sub_menu_under', '=', 34)
            -> join('mwp_articles_live_feeds','mwp_articles.id','=','mwp_articles_live_feeds.article_id')
            ->orWhere('sub_menu_under', '=', 18)
            ->orderBy('article_updated')
            ->take(5)
            ->get();
        }else {
            if($cat==19){
                $highlight = Articles::where('sub_menu_under', '=', 9)
                -> join('mwp_articles_live_feeds','mwp_articles.id','=','mwp_articles_live_feeds.article_id')
                ->orWhere('sub_menu_under', '=', 18)
                ->orderBy('article_updated')
                ->take(5)
                ->get();
            }else{
              
            }
           
        }
      
        $live_feeds =  DB::table('mwp_articles_live_feeds')
                -> join('mwp_articles','mwp_articles_live_feeds.article_id','=','mwp_articles.id')
                -> select('mwp_articles_live_feeds.*','mwp_articles.*')
                ->orderBy('mwp_articles_live_feeds.id','DESC')
                ->where('sub_menu_under', '=', $cat)
                ->where('article_id','!=',$id)
                ->get();


        $IMAGE_PATH = "https://www.bollywoodshaadis.com/img/";
        return view('welcome')->with('live_feeds',$live_feeds)->with('article',$article)->with("highlights", $highlight)->with("IMAGE_PATH", $IMAGE_PATH);
    }

}