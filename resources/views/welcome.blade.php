<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">  
  <link rel="preload" href="http://bollywood.in.ngrok.io/assets/fonts/glyphicons-halflings-regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <script src="{{ asset('js/share.js') }}"></script>
</head>
<style>
#more {display: none;}
i{  
            font-size: 50px !important;  
            padding: 10px;  
  }  
  #social-links ul{
          padding-left: 0;
     }
     #social-links ul li {
          display: inline-block;
     } 
     #social-links ul li a {
          padding: 10px;
          margin: 4px;
          font-size: 25px;
     }
     #social-links .fa-facebook{
           color: #0d6efd;
     }
   
     #social-links .fa-whatsapp{
          color: #25D366
     }
</style>
<body class="relative overflow-x-hidden overflow-y-auto bg-gray-100 font-sans">
@include ('layout.header')
<div class="w-full bg-white font-sans">

  <div class="lf_container flex flex-wrap mb-5 pb-5">
 
   <div class="w-full ">
    <div class="my-5 mx-0 pt-0 pr-0 pb-2.5 pl-0 border-b-solid border-b border-b-[#eaeaea]">
      <div class="text-[#7d7d7d] font-normal text-[13px] mb-3.5">
        <a class="mb-3.5" title="home" href="/">Home</a>
        <span> > </span> Live Updates
      </div>
      <h1 class="mt-2.5 mb-2.5 art-font-small md:art-font-big  tracking-articlespace m-0 text-black">
      <?php echo $lf_feed->lf_title.": ".$article->article_title;  ?>
      </h1>
      <h2 class="mt-2.5 mb-2.5 summary-font-small md:summary-font-big text-[#595959]">
      <?php echo str_replace("â€˜", "'", str_replace("â€™", "'", $article->article_summary)); ?> 
      </h2>
      <div class="xs:text-base text-tiny font-semibold text-[#7070700 py-1 px-0 ">
        <div class=" text-[#818181]">
          by <b><a class=" text-[#d52457] no-underline"><?php echo $article->article_by; ?></a> &nbsp; |&nbsp;</b>
          Last Updated: <?php echo $article->article_updated; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="mb-5 p-0 block">
    <span class="font-semibold text-2xl text-black mr-2 my-1.5 ml-0 uppercase align-middle">Tags:</span>
      <?php if(isset($article->tags)): ?>
        <?php foreach($article->tags as $tag): ?>
          <a class="font-normal text-2xl bg-[#f3f3f3] text-[#2e2e2e] py-0.5 px-1 mt-0 mr-1 mb-1.5 ml-0 border border-solid border-[#ccc] inline-block capitalize" href="http:bollywood.ngrok.in/<?php echo $tag['url']; ?>" title="<?php echo $tag['tag']; ?>"><?php echo $tag['tag']; ?> </a>
        <?php endforeach; ?>
      <?php endif; ?><!-- /tags -->
  </div>
  <img class="w-full h-auto rounded-[20px]" src="<?php echo $IMAGE_PATH ?><?php echo $article->article_image_landscape ?>" alt="<?php echo $article->article_title?>" title="<?php echo $article->article_title?>">
  <?php $content = str_replace('http://delhi.bollywoodshaadis.com', 'http://www.bollywoodshaadis.com',$article->article_description); 
  $pars = explode('</p>', $content);?>
  <div class="md:desc-font-big desc-font-small font-normal mt-5 mr-0 mb-2.5 ml-0">
    <?php echo $pars[0]; ?> <br/>
  </div>

  <div class="mt-5 bg-[#f2f2f2] pb-1 relative overflow-y-hidden mb-2 hide-scrollbar overflow-x-clip">
    <div class="font-semibold text-center px-2.5 py-4 uppercase xs:text-xl xs:py-5 xs:px-0 highlight-title-font">
    Highlights
    </div>
    
    <div class="py-6 px-5 flex -m-px overflow-x-auto hide_scrollbar">
    <?php if(isset($highlights)): ?>
        <?php foreach($highlights as $highlight): ?>
        <a href="{{ URL('articles/'.$highlight->article_id.'/'.$highlight->sub_menu_under)}}" class="px-2.5 text-xs text-[#8A8A8A] no-underline bg-white opacity-[.80] mr-4 rounded-none">   
              <div id="lb-highlight-<?php echo $highlight->article_id?>" class="highlight-box-font font-medium xs:text-sm bg-white py-4 px-1.1 m-0 rounded-md text-black">
                  <div class="xs:w-320 xs:h-85 min-h-60 min-h-120 w-250 h-60 min-h-60 max-h-120  ">
                  <?php echo $highlight->article_title ?></div>
              </div>   
              <span class=" float-right w-[18px] h-[18px] inline-block bg-no-repeat align-bottom xs:w-6 xs:h-6 relative -right-[10px] bottom-0  " style="background-image: url(https://www.pinkvilla.com/sites/all/themes/pinkvillablaze/assets/icons/right-arrow-pink.png)"></span>   
        </a>
        <?php endforeach; ?>
      <?php endif; ?><!-- /highlights -->
    </div>
  </div>

  <div class="mt-2 pb-1 flex-grow-0 flex-shrink-0 mb-4 w-full">
    <div class="flex flex-wrap py-0 px-4">
     <?php if(isset($live_feeds)): ?>
        <?php foreach($live_feeds as $lf): ?>
         
          <div class="xs:p-30 pt-3 pr-3 pb-3.5 pl-5 border-l border-solid border-[#D3D3D3] border-b w-full">
            <div class="absolute">
              <span class="bg-[#f44] w-[10px] h-[10px] xs:w-[13px] xs:h-[13px] absolute rounded-full mt-2.5 -left-6 xs:-left-9"></span>
            </div>
      
            <div class=" xs:text-sm text-[16px] font-light text-[#818181] mt-1.1 ">
            <?php echo $lf->article_updated ?> IST
            </div>
            
            <div class=" font-semibold py-2 text-4xl xs:text-[22px] text-[#3d3d3d] mt-1.1 ">
            <?php echo $lf->article_title ?> 
            </div>
           
           
            <div class="lf-font-small md:lf-font-big text-[#6c6c6c] mt-1.1 pt-1">
              <div class=" w-full break-words max-w-full flex-grow-0 flex-shrink-0 ">
                  <div>
                  <?php 
                  $feedContent = str_replace('http://delhi.bollywoodshaadis.com', 'http://www.bollywoodshaadis.com',$lf->article_description); 
                  $feedDesc = explode('</p>', $feedContent);?>
                    <span > 
                      <?php echo $feedDesc[0]; ?> <br/>
                      
                    </span>
                  </div>
              </div>
            </div>
           
            <div class="mt-2 mb-2">
             <img class="w-full h-auto rounded-[20px]" src="<?php echo $IMAGE_PATH ?><?php echo $lf->article_image_landscape ?>" alt="<?php echo $lf->article_title?>" title="<?php echo $lf->article_title?>">
            </div>

            <div class="w-full">
            <div class="flex flex-wrap p-0">
              <div class="xs:text-base text-[13px] font-medium mt-2.5 mb-1.1 text-[#e43462] underline uppercase w-1/2">
                <a class="text-[#d52457]" href="{{ URL('articles/'.$lf->article_id.'/'.$lf->sub_menu_under)}}">Read More</a>
              </div>
              <div class=" mb-1.1 w-1/2 flex-grow-0 flex-shrink-0 basis-1/2 " >
                 <div class=" float-right cursor-pointer social-btn-sp">
                        {!! $shareButtons !!}
                 </div>
              </div>
            </div>
          </div>
          </div>
         
       <?php endforeach; ?>
      <?php endif; ?><!-- /tags -->
    </div>

  </div>
</div>
 



</div>


@include ('layout.footer')

</body>

<script>
 
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
</html>