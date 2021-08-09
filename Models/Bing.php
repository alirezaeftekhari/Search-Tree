<?php
require_once __DIR__.'/SearchEngine.php';
class Bing extends SearchEngine {
    protected string $staticUrl = "https://www.bing.com/search?q={{keyword}}&qs=HS&sk=HS1&sc=3-0&cvid=B965C5A4317C437B8C30324693B940C7&FORM=QBLH&sp=2";

    public function parse() {
        foreach($this->html->find('li') as $li) {
            if ($li->class === 'b_algo') {
                $a = $li->first_child()->first_child();
                $span = $a->first_child();
                if(!empty($span->innertext) and !empty($a->getAttribute('href'))) {
                    array_push($this->probeLinks, [$span->innertext, urldecode($a->getAttribute('href'))]);
                }
            }
        }
    }
}
