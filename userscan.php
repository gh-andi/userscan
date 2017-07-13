<html>
  <head>
    <title>G-Share user scan</title>
    <link rel="icon" href="./themes/BlueBasicTheme///core/img/favicon.ico">
    <style>
      html, body, div, span, applet, object, iframe,h1, h2, h3, h4, h5, h6, p, blockquote, pre,a, abbr, acronym, address, big, cite, code,del, dfn, em, img, ins, kbd, q, s, samp,small, strike, strong, sub, sup, tt, var,b, u, i, center,dl, dt, dd, ol, ul, li,fieldset, form, label, legend,table, caption, tbody, tfoot, thead, tr, th, td,article, aside, canvas, details, embed,figure, figcaption, footer, header, hgroup,menu, nav, output, ruby, section, summary,time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
      }
/* HTML5 display-role reset for older browsers */
      article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {
        display: block;
      }
      body {
        line-height: 1;
      }
      ol, ul {
        list-style: none;
      }
      blockquote, q {
        quotes: none;
      }
      blockquote:before, blockquote:after,
      q:before, q:after {
        content: '';
        content: none;
      }
      table {
        border-collapse: collapse;
        border-spacing: 0;
      }

      body, html {
        width: 100vw;
        height:100vh;
        margin: 0px;
        font-family: arial;
      }

      #container {
        width: 100vw;
        height: 95vh;
        background: linear-gradient(#7E8EB2,#41598F);
        padding-top: 5vh;
      }

      div#openingmessage {
        text-align: center;
        font-size: 16px;
        margin-bottom: 10px;
        padding: 30px;
      }

      span#title {
        font-size: 30px;
        margin-bottom: 5px;
		        margin-top: 20px;
      }

      .main {
        width: 40vw;
        margin-left: 30vw;
        background-color: hsla(0, 0%, 0% , 0.5);
        color: white;
      }

      #content-box {
        color: white;
        padding: 30px;
      }

      #openingmessage span {
        display: inline-block;
        line-height: 130%;
      }

      #logo-div {
        height: 150px;
        width: 150px;
        display: block;
        background-image: url("./themes/BlueBasicTheme/core/img/logo-gshare-200px.png");
        margin-left: calc(50% - 90px);
        background-size: contain;
      }

      #content-title {
        font-size: 22px;
      }
    </style>
  </head>
  <body>
    <div id="container">
      <div class="main">
        <div id="openingmessage">
          <div id="logo-div"></div>
          <span id="title">G-Share user change scan</span><br/>
          <span>Loading this page triggers a user scan for the EFS solution G-Share.</span>
          <span>Once this site finished loading, the scan has finished running aswell, all users that have been added or removed in AD will also be reflected in G-Share.</span>
        </div>
      </div>
      <div class="main">
        <div id="content-box">
          <span id="content-title">Server response:</span><br/>
          <br />
                <?php
                                $userSync = exec(" sudo -u apache php  ./occ user:sync 'OCA\User_LDAP\User_Proxy' -m 'remove' -n",$resultarray,$result);
/*                              $userSync = exec("ls -al",$resultarray,$result);*/
                                foreach($resultarray as $key => $value) {
                                        echo $value."<br>";
                                }
                        /*$userSync = exec(" sudo -u apache php  ./occ user:sync 'OCA\User_LDAP\User_Proxy' -m 'remove' -n",$resultarray,$result);*/

                                if( $result <> 0 ) {
                                        echo "issue appeared with the user sync";
                                }
                                else{
                                        echo "the user sync was succesfull";
                                }

                ?>
        </div>
      </div>
    </div>
  </body>
</html>
