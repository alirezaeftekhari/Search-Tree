<?php
//check keyword not set  and redircet to index.html
if(!isset($_POST['keyword'])) {
    header('Location: index.php');
}

//dependencies
require_once __DIR__.'/Models/SearchEngines/Google.php';
require_once __DIR__.'/Models/SearchEngines/Yahoo.php';
require_once __DIR__.'/Models/SearchEngines/Bing.php';
require_once __DIR__.'/Models/Comparison.php';
require_once __DIR__.'/Models/Suggestions.php';
//input keyword
$keyword = filter_input(INPUT_POST, 'keyword');
//process
$google = new Google($keyword);
$yahoo = new Yahoo($keyword);
$bing = new Bing($keyword);

$glinks = $google->getLinks();
$ylinks = $yahoo->getLinks();
$blinks = $bing->getLinks();

$Comparison = new Comparison($glinks, $ylinks, $blinks);
$Suggestions = new Suggestions($glinks, $ylinks, $blinks);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Result</title>
    <link rel="icon" href="img/favpng_root-system-tree-oak.png" />
    <link rel="stylesheet" href="./css/result.css" />
  </head>
  <body>
    <div class="search-box">
      <form method="post" action="result.php">
        <input type="text" name="keyword" class="search-bar" value="<?php echo $keyword;?>" />
        <input type="submit" value="" />
        <!-- <img src="./img/search.svg" alt="search" class="search-icon" /> -->
      </form>
    </div>
    <div class="mega-container">
      <div class="suggestion-container">
        <h2 class="tb-title">Our Suggestion</h2>
        <table class="suggestion-tb tb">
          <tr>
            <th class="th th-rank"></th>
            <th class="th th-score"></th>
            <th class="th">
              <img class="td-logo" src="./img/google-color.svg" alt="Google" />
            </th>
            <th class="th">
              <img class="td-logo" src="./img/bing-color.svg" alt="Bing" />
            </th>
            <th class="th">
              <img class="td-logo" src="./img/yahoo-color.svg" alt="Yahoo" />
            </th>
            <th class="th th-links"></th>
          </tr>
            <?php
            foreach ($Suggestions->getSuggestions() as $key => $suggestion) {
                $rank = $key + 1;
                $score = $suggestion['score'];
                $googleRank = $suggestion['google'] ?? '-';
                $bingRank = $suggestion['bing'] ?? '-';
                $yahooRank = $suggestion['yahoo'] ?? '-';
                $href = $suggestion['href'];
                $text = $suggestion['text'];
                echo <<< lable
                    <tr>
                        <td>$rank</td>
                        <td class="td-score">$score</td>
                        <td>$googleRank</td>
                        <td>$bingRank</td>
                        <td>$yahooRank</td>
                        <td><a href="$href">$text</a></td>
                    </tr>
                    lable;
            }
            ?>
        </table>
      </div>

      <div class="search-engines-container">
        <div class="google engine">
          <div class="img">
            <img src="./img/google-color.svg" alt="Google" />
          </div>
          <table class="google-tb tb">
            <tr>
              <th class="th th-rank"></th>
              <th class="th th-links"></th>
              <th class="th">Yahoo Rank</th>
              <th class="th">Bing Rank</th>
            </tr>
              <?php
              foreach ($glinks as $key => $link) {
                  $href = $link['href'];
                  $text = $link['text'];
                  $rank = $key + 1;
                  $yahooRank = $link['yahoo'] ?? '-';
                  $bingRank = $link['bing'] ?? '-';
                  echo <<< lable
                    <tr>
                        <td>$rank</td>
                        <td><a href="$href">$text</a></td>
                        <td>$yahooRank</td>
                        <td>$bingRank</td>
                    </tr>
                    lable;
              }
              ?>
          </table>
        </div>
        <div class="bing engine">
          <div class="img">
            <img src="./img/bing-color.svg" alt="Bing" />
          </div>
          <table class="bing-tb tb">
            <tr>
              <th class="th th-rank"></th>
              <th class="th th-links"></th>
              <th class="th">Yahoo Rank</th>
              <th class="th">Google Rank</th>
            </tr>
              <?php
              foreach ($blinks as $key => $link) {
                  $href = $link['href'];
                  $text = $link['text'];
                  $rank = $key + 1;
                  $yahooRank = $link['yahoo'] ?? '-';
                  $googleRank = $link['google'] ?? '-';
                  echo <<< lable
                    <tr>
                        <td>$rank</td>
                        <td><a href="$href">$text</a></td>
                        <td>$yahooRank</td>
                        <td>$googleRank</td>
                    </tr>
                    lable;
              }
              ?>
          </table>
        </div>
        <div class="yahoo engine">
          <div class="img">
            <img src="./img/yahoo-color.svg" alt="Yahoo" />
          </div>
          <table class="yahoo-tb tb">
            <tr>
              <th class="th th-rank"></th>
              <th class="th th-links"></th>
              <th class="th">Google Rank</th>
              <th class="th">Bing Rank</th>
            </tr>
              <?php
              foreach ($ylinks as $key => $link) {
                  $href = $link['href'];
                  $text = $link['text'];
                  $rank = $key + 1;
                  $googleRank = $link['google'] ?? '-';
                  $bingRank = $link['bing'] ?? '-';
                  echo <<< lable
                    <tr>
                        <td>$rank</td>
                        <td><a href="$href">$text</a></td>
                        <td>$googleRank</td>
                        <td>$bingRank</td>
                    </tr>
                    lable;
              }
              ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
