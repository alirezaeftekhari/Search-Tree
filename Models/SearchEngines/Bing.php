<?php
require_once __DIR__ . '/SearchEngine.php';

class Bing extends SearchEngine
{
    protected string $staticUrl = "https://www.bing.com/search?q={{keyword}}&form=QBLH&sp=-1&pq=expressjs&sc=8-9&qs=n&sk=&cvid=3600B1794DBE4073B772AFFC6E4D5AD5";

    public function parse()
    {
        foreach ($this->html->find('li') as $li) {
            if ($li->class === 'b_algo') {
                $a = $li->first_child()->first_child();
                $span = $a->first_child();
                if (!empty($span->innertext) and !empty($a->getAttribute('href'))) {
                    array_push($this->probeLinks, [
                        'text' => $span->innertext,
                        'href' => urldecode($a->getAttribute('href'))
                    ]);
                }
            }
        }
    }
}
