<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search Tree</title>
    <link rel="icon" href="./img/favpng_root-system-tree-oak.png" />
    <link rel="stylesheet" href="css/main.css" />
    <script defer src="./js/app.js"></script>
  </head>
  <body>
    <div class="img-container">
      <img
        class="logo"
        id="logo"
        src="img/google-without-color.svg"
        alt="google"
      />
      <img
        id="colorful-logo"
        class="colorful-logo hide"
        src="img/google-color.svg"
        alt="google"
      />
      <img class="logo" id="logo" src="img/bing-w-color.svg" alt="bing" />
      <img
        src="img/bing-color.svg"
        id="colorful-logo"
        class="colorful-logo hide"
        alt="bing"
      />
      <img class="logo" id="logo" src="img/yahoo-w-color.svg" alt="yahooo" />
      <img
        src="img/yahoo-color.svg"
        id="colorful-logo"
        class="colorful-logo hide"
        alt="yahoo"
      />
    </div>
    <div id="cover">
      <form method="post" action="result.php">
        <div class="tb">
          <div class="td">
            <input
              type="text"
              id="search"
              name="keyword"
              placeholder="Search"
              pattern=".*\S.*"
              autofocus
              required
            />
          </div>

          <div class="td" id="s-cover">
            <button type="submit">
              <div id="s-circle"></div>
              <span></span>
            </button>
          </div>
        </div>
      </form>
    </div>
    <footer>
      <div class="designer">
        <p>
          <span
            ><img
              src="img/web-design.svg"
              alt="Designer"
              class="creators" /></span
          ><a
            href="https://www.instagram.com/_amingh78/"
            class="user-insta"
            target="_blank"
            >_amingh78</a
          >
        </p>
      </div>
      <div class="developer">
        <p>
          <span
            ><img
              src="img/digital-platform.svg"
              alt="Developer"
              class="creators"
          /></span>
          <a
            href="https://www.instagram.com/mrpure.ir/"
            class="user-insta"
            target="_blank"
            >mrpure.ir</a
          >
        </p>
      </div>
    </footer>
  </body>
</html>
