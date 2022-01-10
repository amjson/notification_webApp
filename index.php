<!DOCTYPE html>
<html>
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is a Notification System">
    <meta name="keywords" content="Notification System">
    <meta name="author" content="Joeson Misiani">

    <title>Notification System</title>

    <!--========== CSS Styllings ==========-->
    <link rel="stylesheet" href="MyCustom/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="MyCustom/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="MyCustom/fontawesome-free/css/v4-shims.min.css">

    <!--========== JS Scripts ==========-->
    <script src="MyCustom/js/jquery.js"></script>
    <script src="MyCustom/js/bootstrap.min.js"></script>
  </head> 

  <style>
    /*===== [ custom properties ] =====*/
    :root {
      /* fonts family */
      --ff-primary: serif;
      --ff-secondary: 'ubuntu';

      /* font weight */
      --fw-s1: 300;
      --fw-s2: 400;
      --fw-s3: 500;
      --fw-s4: 600;

      /* color */
      --clr-white: #fff;
      --clr-black: #111;      
      --clr-gray: #767676;
      --clr-lightDark: #222;
      --clr-lightGray: #DCDCDC;
      --clr-darkGray: #333;
      --clr-blue: #1e90ff;

      /* box shadow */
      --bs: 0.25em 0.25em 0.75em rgba(0,0,0,.25),
            0.125em 0.125em 0.25em rgba(0,0,0,.15);
    }

    /*[ start General properties ]*/
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    a, a:hover {
      text-decoration: none;
    }
    section {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
      width: 100%;
      background: var(--clr-lightGray);
    }

    .container {
      position: relative;
      z-index: 1000;
      width: 100%;
      max-width: 600px;
      padding: 10px 40px;
      background: var(--clr-white);
      box-shadow: var(--bs);
      border-radius: 3px;
      overflow: hidden;
    }
    .container::before {
      content: "";
      position: absolute;
      top: 0;
      left: -40%;
      width: 100%;
      height: 100%;
      background: rgba(255,255,255,0.05);
      pointer-events: none;
      transform: skewX(-15deg);
    }    
    .max-width {
      display: flex;
      justify-content: space-between;
      border: 1px solid transparent;
      width: 100%;
      height: 70px;
      margin-bottom: 0;
      padding-left: 0;
      padding-right: 0;
    }

    /*[ start logo ]*/
    .blur,.focused {
      font-weight: var(--fw-s4);
      margin: 0px;
      background: none;
      font-family: var(--ff-secondary);
      color: var(--clr-light);
      letter-spacing: 0;
      text-transform: uppercase;
    }
    .section_logo {
      border: 1px solid transparent;
      margin-top: 18px;
      width: 10em;
      height: 30px;
      cursor: pointer;
    }
    .section_logo-big {
      position: relative;
      width: 100%;
      text-align: center;
    }
    .section_logo-big .blur {
      position: absolute;
      top: 0;
      line-height: 27px;
      font-size: 1.7em;
      width: 100%;
    }
    .section_logo-big .blur a {
      color: #999;
      opacity: .6;
    }
    .section_logo-small {
      display: inline-block;
    }
    .focused a {
      color: var(--clr-black);
      letter-spacing: 1.7px;
    }
    .section_logo-small strong {
      color: var(--clr-blue);
      opacity: 0.9;
    }
    .section_logo-big h3 {
      margin-top: 6px;
      margin-left: 4px;
      padding-top: 4px;
      padding-left: 5px;
      padding-right: 4px;
      padding-bottom: 5px;
      line-height: 9px;
      position: relative;
      display: inline-block;
      font-size: 1em;
    }
    .section_logo-big .focused:before {
      bottom: 0;
      left: 0;
      content: '';
      position: absolute;
      width: 8px;
      height: 8px;
      opacity: 1;
      border-bottom: 1px solid var(--clr-blue);
      border-left: 1px solid var(--clr-blue);
    }
    .section_logo-big .focused:after {
      top: 0;
      right: 0;
      content: '';
      position: absolute;
      width: 8px;
      height: 8px;
      opacity: 1;
      border-top: 1px solid var(--clr-blue);
      border-right: 1px solid var(--clr-blue);
    }

    .blank {
      border: 1px solid transparent;
      height: 30px;
      width: 70%;
      margin-top: 18px;
    }

    /*[ start dropdown menu ]*/
    .dropMenu {
      border: 1px solid transparent;
      height: 30px;
      width: 40px;
      margin-top: 18px;
    }
    .dropMenu .caret {
      border:1px solid transparent;
      height: 28px;
      width: 100%;
      margin: 0px;
      font-family: var(--ff-secondary);
      font-size: 18px;
    }    
    .dropMenu .caret a {
      color: rgba(0,0,0,.7);
      cursor: pointer;
    } 
    .dropMenu .caret a .show_num {
      border-radius: 50%;
      font-size: 12px;
      position: absolute;
      margin-top: -5px; 
      margin-left: -13px;
      font-family: var(--ff-secondary);
    }
    .dropMenu .caret .drop_me_down {
      margin-left: -140px;
      padding: 0 15px;
      width: 200px;
      box-shadow: var(--bs);
    }

    /*[ start form ]*/
    .title h5 {
      border: 1px solid transparent;
      text-align: center;
      font-family: ubuntu;
      margin-top: 0;
      margin-left: -5px;
      font-size: 25px;
      font-weight: var(--fw-s3);
    }
    .container .row100 {
      position: relative;
      width: 100%;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    }
    .container .row100 .col {
      position: relative;
      width: 100%;
      padding: 0 10px;
      margin-top: 5px;
      margin-bottom: 30px;
    }
    .container .row100 .col .inputBox {
      position: relative;
      width: 100%;
      height: 40px;
      color: var(--clr-gray);
    }
    .container .row100 .col .inputBox input,
    .container .row100 .col .inputBox textarea {
      position: absolute;
      width: 100%;
      height: 100%;
      background: transparent;
      box-shadow: none;
      outline: none;
      border: none;
      font-size: 15px;
      padding: 0 10px;
      color: var(--clr-gray);      
      font-family: var(--ff-secondary);
      z-index: 1;
    }
    .container .row100 .col .inputBox .text {
      position: absolute;
      top: 0;
      left: 0;
      line-height: 40px;
      font-size: 16px;
      font-family: var(--ff-secondary);
      padding: 0 10px;
      display: block;
      transition: 0.5s;
      pointer-events: none;
    }
    .container .row100 .col .inputBox input:focus + .text,
    .container .row100 .col .inputBox input:valid + .text,
    .container .row100 .col .inputBox textarea:focus + .text,
    .container .row100 .col .inputBox textarea:valid + .text  {
      top: -30px;
      left: -10px;
    }
    .container .row100 .col .inputBox textarea {
      resize: none;
    }
    .container .row100 .col .inputBox .line {
      position: absolute;
      bottom: 0;
      display: block;
      width: 100%;
      height: 1px;
      background: var(--clr-gray); 
      transition: 0.5s;
      border-radius: 2px;
      pointer-events: none;
    }
    .container .row100 .col .inputBox input:focus ~ .line,
    .container .row100 .col .inputBox input:valid ~ .line,
    .container .row100 .col .inputBox textarea:focus ~ .line,
    .container .row100 .col .inputBox textarea:valid ~ .line {
      height: 100%;      
      border-bottom: 1px solid var(--clr-gray);
      background: var(--clr-white);
    }
    .container .row100 .col .inputBox.textarea {
      position: relative;
      width: 100%;
      height: 100px;
      padding: 10px 0;
    }
    .container .row100 .col input[type="submit"] {
      border: none;
      border-radius: 3px;
      padding: 3px 35px;
      cursor: pointer;
      outline: none;
      color: var(--clr-white);
      background: var(--clr-blue);
      font-weight: var(--fw-s2);
      font-size: 18px;
      font-family: var(--ff-secondary);
    }
  </style>

  <body>
    <section>
      <div class="container">
        <nav class="navbar navbar-expand-lg max-width">
          <div class="section_logo">
            <div class="section_logo-big"> 
              <h1 class="blur"><a href="index.html">Joesnest</a></h1>

              <h3 class="focused">
                <a href="index.html">
                  <span class="section_logo-small">Joe<strong>nest</strong></span>
                </a>
              </h3>
            </div>
          </div> 

          <div class="blank"></div>

          <ul class="dropMenu">
            <li class='nav-item dropdown caret'>
              <a class='dropdown-toggle' id='navbarDropdownProfile' data-toggle='dropdown'
              aria-haspopup='true' aria-expanded='false'>
                <i class='fa fa-bell-o fa-lg fa-fw' aria-hidden='true'></i>
                <span class="label label-pill label-danger count show_num"></span> 
              </a>
              
              <div class='dropdown-menu dropdown-menu-right drop_me_down' 
              aria-labelledby='navbarDropdownProfile'>
              </div>
            </li>
          </ul>
        </nav>

        <form action="" method="POST" id="comment_form" autocomplete="off"> 
          <div class="title"><h5>notify me</h5></div>

          <div class="row100">
            <div class="col">
              <div class="inputBox">
                <input type="text" name="subject" id="subject" required="">
                <span class="text">Subject</span>
                <span class="line"></span>
              </div>
            </div>
          </div>

          <div class="row100">
            <div class="col">
              <div class="inputBox textarea">
                <textarea type="text" name="comment" id="comment" required=""></textarea>
                <span class="text">Write your comment here</span>
                <span class="line"></span>
              </div>
            </div>        
          </div>

          <div class="row100">
            <div class="col">
              <input type="submit" name="post" id="post" value="post">
            </div>        
          </div>
        </form>
      </div>
    </section>

    <script>
      $(document).ready(function() {
        function load_unseen_notification(view = '') {
          $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(data)
            {
              $('.dropdown-menu').html(data.notification);
              if(data.unseen_notification > 0)
              {
                $('.count').html(data.unseen_notification);
              }
            }
          });
        }
 
        load_unseen_notification();
        $('#comment_form').on('submit', function(event) {
          event.preventDefault();
          if($('#subject').val() != '' && $('#comment').val() != '') {
            var form_data = $(this).serialize();
            $.ajax({
              url:"insert.php",
              method:"POST",
              data:form_data,
              success:function(data)
              {
                $('#comment_form')[0].reset();
                load_unseen_notification();
              }
            });
          }
          else {
            alert("Both Fields are Required");
          }
        });
 
        $(document).on('click', '.dropdown-toggle', function(){
          $('.count').html('');
          load_unseen_notification('yes');
        });
     
        setInterval(function(){ 
          load_unseen_notification();; 
        }, 5000);
      });
    </script>
  </body>
</html>