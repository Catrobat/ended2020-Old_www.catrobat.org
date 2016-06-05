<?php
$stats = @file_get_contents("https://www.openhub.net/p/catrobat");
@preg_match("/<ul class='unstyled nutshell' id='factoids'>(.*?)<\/ul>/si", $stats, $stats);
@preg_match_all("/<a.*?>([0-9\,]+).*?<\/a>/si", $stats[0], $stats);
$stats = $stats[1];
/*$stats[0] = "X";
$stats[1] = "Y";
$stats[2] = "Z";*/
?>

<div id="banner" style="background-image: url(img/banner_contribute.jpg);">
  <div>
    <span>Contribute</span><br />
    Be part of an ever growing project
  </div>
</div>

<div class="content bottom-padding">
  <div class="max-width">
    <h1><img class="header-icon" src="img/icon_devteam.png" />Be part of our developer team</h1>
    <p>We always welcome new members that are willing to contribute to the Catrobat project. If you are interested into developing with us we recommend you to read through the &ldquo;First Steps into Catrobat&rdquo; section. For native speakers of any language that are interested into translating our apps and facilities we recommend to read more about &ldquo;Translating on Crowdin&rdquo;.</p>
  </div>
  
  <hr />
  
  <div class="max-width expandable">
    <h1><img class="header-icon" src="img/icon_firststeps.png" />First steps into Catrobat</h1>
    <strong>The following lines should help you with your first steps into the Catrobat project.</strong>
    <p>Assuming you already know the contents of <a href="catrobat.org/">catrobat.org</a> your next steps should be:
      <ol>
        <li><strong>Write some programs using Pocket Code and Pocket Paint.</strong><br />
        Upload your Catrobat programs to our <a class="analytics" href="http://pocketcode.org" target="_blank">community site</a> and check out our inspiration source, <a href="http://scratch.mit.edu/" target="_blank">the Scratch project</a>.</li>
        
        <li><strong>Visit us on GitHub.</strong><br />
          2. As you can see Catrobat is a very large project with lots of sub-teams. Each project has a readme file that contains viable information for you. Go ahead and check out all of them.</li>
        
        <li><strong>Visit our Google+ Community.</strong><br />
        If you want more information about what is going on currently visit us our <a href="https://plus.google.com/communities/116816272940643231129" target="_blank">Google+ Community named Catrobat</a>. If you would like to work with us, please read on.</li>
        
        <li><strong>Choose a Project.</strong><br />
        If you want to contribute to our project, please choose one of the sub-projects you would like to work on. Once you have chosen a project, we recommend you to checkout the project contents and play around with it.</li>
        
        <li><strong>Found a Bug?</strong><br />
        Maybe you found a bug while trying out Catrobat? Awesome. Report it via GitHub. If you couldn't find a bug yet it doesn't matter; seems that we have done too much the right way ;)</li>
        
        <li><strong>Check out Issues on GitHub.</strong><br />
        Now it's the right time to check out the issues on GitHub. Start with forking the project and then choose an issue you are able to fix. First write a regression test for it, and then fix it.<br />&nbsp;<br />
        Note: We strictly use <a href="http://c2.com/cgi/wiki?TestDrivenDevelopment" target="_blank">Test-Driven Development</a> and Clean Code (by <a href="http://en.wikipedia.org/wiki/Robert_Cecil_Martin" target="_blank">Robert C. Martin</a>), so first read everything you can about these development methods. Code developed in a different style will not be accepted.
        </li>
        
        <li><strong>Get a Review.</strong><br />You have fixed an Issue and written at least one test for it? Awesome. Ask for a review via a Pull-Request in Github.</li>
        
        <li><strong>Stay active in the meanwhile.</strong><br />
        It could take time some time until you hear from us. In the meanwhile you can choose another issue or engage in the <a href="https://plus.google.com/communities/116816272940643231129" target="_blank">community on Google+</a>. Try to answer questions of visitors or pose questions yourself, if you have still have some.</li>
        
        <li><strong>Pull-Requst got accepted.</strong><br />
        Your Pull-Request has been accepted? Nice job. Go back to 6 and choose a new issue to work on.</li>
        
        <li><strong>There are no more Issues?</strong><br />
        Can't be! Go back to 5 and find some bugs that you can solve.</li>
        
        <li><strong>Any Questions?</strong><br />
        If there are still unanswered questions left please visit our Google Groups forum. You might find the answer to your question there and if not, you can open a new thread.</li>
      </ol>
  </div>
  
  <hr />
  
  <div class="flex-container-h extension">
    <div style="order: 0; background-image: url(img/promo_github.png);"></div>
    <div class="flex-container-v">
      <h2>Our source code on Github</h2>
      <p>Catrobat is a very large project with many sub-teams. We use Github to organize and synchronize our code. The readme file under the directory of each sub-team contains useful information about the teams, their issues and contribution.</p>
      <a class="button" href="https://github.com/Catrobat" target="_blank">Visit</a>
    </div>
  </div>
  
  <div class="flex-container-h extension">
    <div style="order: 1; background-image: url(img/promo_crowdin.png);"></div>
    <div class="flex-container-v">
      <h2>Translating on Crowdin</h2>
      <p>We use Crowdin to translate our apps and facilities into other languages. Translators of any language may register and contribute on Crowdin. For further information please contact us via translate@catrobat.org.</p>
      <a class="button" href="https://crowdin.com/project/catrobat" target="_blank">Visit</a>
    </div>
  </div>
  
  <div class="flex-container-h extension">
    <div style="order: 0; background-image: url(img/promo_statistics.png);"></div>
    <div class="flex-container-v">
      <h2>Project statistics on Open HUB</h2>
      <p>By now Catrobat has had <strong><?=$stats[0]?></strong> commits made by <strong><?=$stats[1]?></strong> contributors representing <strong><?=$stats[2]?></strong> lines of code. These and lots of other interesting statistics about the Catrobat project can be found on Open HUB.</p>
      <a class="button" href="https://www.openhub.net/p/catrobat" target="_blank">Visit</a>
    </div>
  </div>
  
  <hr />
  
  <div class="max-width">
  	<h1><img class="header-icon" src="img/icon_features.png" />Features under development</h1>
    <p>The following features are currently under development but still in alpha stage:</p>
    <ul>
    	<li>Tutorial game</li>
    	<li>HTML5/Javascript edition</li>
    	<li>iOS edition (<a href="http://youtu.be/FzoXTzyp5DE" target="_blank">video 1/2013</a>) (beta)</li>
    	<li>Windows Phone edition (<a href="http://goo.gl/2iqLI" target="_blank">video 10/2012</a>)</li>
    	<li>Android stand alone apk builder</li>
    	<li>Android live wallpaper builder (<a href="http://youtu.be/TGf8cCF2x6o?t=2m20s" target="_blank">video 1/2013</a>)</li>
    	<li>Arduino I/O via Bluetooth for Catroid</li>
    	<li>Parrot AR.Drone via WiFi for Catroid, with OpenCV support (<a href="http://goo.gl/HLV7H" target="_blank">video 1</a>, <a href="http://goo.gl/1CcBK" target="_blank">video 2</a>, <a href="http://goo.gl/1e5IJ" target="_blank">video 3</a>, 10/2011)</li>
    	<li>Computer vision (similar to Scratch 2.0, but see also <a href="http://goo.gl/1e5IJ" target="_blank">video 3</a> above)</li>
    	<li>Translators support system</li>
    	<li>Lego Mindstorms sensor support for Catroid</li>
    	<li>Physics engine for Catroid based on Box2D (<a href="http://youtu.be/utIj8iU1v28" target="_blank">video 1/2013</a>)</li>
    	<li>Sony Xperia Play (Playstation certified) key support</li>
    	<li>YouTube recording of stage for Catroid</li>
    	<li>Musicdroid that allows to enter musical notation by singing</li>
    	<li>Catroid as a Wireless Human Interface Device (gamepad, mouse, keyboard) for PCs and XBox, Wii, Playstation etc</li>
    	<li>Transcode Scratch programs into Catrobat programs</li>
    	<li>Tablet Integration</li>
    	<li>Drag & Drop in Pre-Stage</li>
    	<li>URL shortening service for Catrobat</li>
    	<li>Young kids version (ages 3 to 7): story-telling only version</li>
    	<li>A dedicated website site for educators using Catrobat</li>
    	<li>Near Field Communication (NFC) for multiplayer coordination</li>
    	<li>Multilingual wiki and forum for Catroid users for small screens</li>
    	<li>Support for the <a href="http://www.tsmartrobot.com/" target="_blank">Albert Robot of SK Telecom</a></li>
    	<li>Textual language version of Catrobat</li>
    	<li>3D version</li>
    	<li>Designs and configurations for different age and gender groups</li>
    	<li>Catrobat as a Typeless Programming Language</li>
    	<li>Simplified audio flip book mode</li>
    	<li>Mutation Testing to increase semantic test coverage and quality</li>
    </ul>
  </div>
  
</div>
