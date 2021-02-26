<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

    /**
     * DOTO
     * получение данных перенести в сервис
     * толстые модели
     * никакого текста в коде все перенести в config
     * исключить дублирование статей по урлу
     * подлючить git
     * собрать все через docker
     * наладить админку
     * переписать на коллекции, отказаться от массивов
     **/


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $client;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }

    public function index()
    {
        //dd(config('rbk.orders'));

        ///$this->saveArticles();
    }

    public function showArticles()
    {
        $articles = Articles::select('*')->get();
        return view('articles', [
            'articles' => $articles
        ]);
    }

    /**
     * Get content from html.
     *
     * @param $parser object parser settings
     * @param $link string link to html page
     *
     * @return array with parsing data
     * @throws \Exception
     */
    public function GetArticles(): array
    {
        $html = $this->getContent(config('rbk.site'));
        //получение списка ссылок на главной
        $crawler = new Crawler($html);
        $post_page_categories = $crawler
            ->filter('.js-news-feed-list > a')
            ->each(function (Crawler $node, $i) {
                return $node->attr('href');
            });
        //-------------
        //Получение отдельных статей+парсинг
        foreach ($post_page_categories as $post) {
            $html_post = $this->getContent($post);
            $crawler = new Crawler($html_post);
            if (stristr($post, config('rbk.site'))) {
                $articles[$post]['title'] = $crawler->filter(config('rbk.pattern.title'))->text();
                $articles[$post]['text'] = $crawler
                    ->filter(config('rbk.pattern.text'))
                    ->each(function (Crawler $node, $i) {
                        return $node->text();
                    });
                $articles[$post]['pre_text'] = $articles[$post]['text'][0];
            }
        }
        return $articles;
    }

    public function saveArticles()
    {
        $articles = $this->GetArticles();
        foreach ($articles as $link => $article) {
            try {
                Articles::create([
                                     'title' => $article['title'],
                                     'link' => $link,
                                     'pre_text' => $article['pre_text'],
                                     'text' => implode(" ", $article['text'])
                                 ]);
            } catch (\Exception $e) {
                continue;
            }
        }
    }

    public function getContent($link)
    {

        $content = $this->client->request('GET', $link);
        return str_replace("\n", " ", $content->getBody()->getContents());
    }

}
