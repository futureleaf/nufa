  
                 <!--////////////////////////////////// BEGINNING QUOVOLVER///////////////////////////////-->
                        
        <div id="quovolver-three" style="margin:-0% 0% 0%;text-align:center;"><!--beginning quovolver-->
		 <div style="margin-left:10%"><br/>
			<blockquote style='width:80%' class="block-three">
				<script type="text/javascript">

				/***********************************************
				* Fading Scroller- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
				* This notice MUST stay intact for legal use
				* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
				***********************************************/

				var delay = 5000; //set delay between message change (in miliseconds)
				var maxsteps=30; // number of steps to take to change from start color to endcolor
				var stepdelay=40; // time in miliseconds of a single step
				//**Note: maxsteps*stepdelay will be total time in miliseconds of fading effect
				var startcolor= new Array(255,255,255); // start color (red, green, blue)
				var endcolor=new Array(0,0,0); // end color (red, green, blue)

				var fcontent=new Array();

				begintag=''; //set opening tag, such as font declarationsbegintag=''; //set opening tag, such as font declarations
				<?php $i=0;foreach($diamondWords as $diamondWord): ?>
				fcontent[<?php echo $i++; ?>]="<p style=\"line-height:24px;font-size:120%;margin-left:0%\"><?php echo $diamondWord->desc_comment;?></p>";
				<?php endforeach; ?>
				closetag='';
		
			

				var fwidth='80%'; //set scroller width
				var fheight='auto'; //set scroller height

				var fadelinks=1;  //should links inside scroller content also fade like text? 0 for no, 1 for yes.

				///No need to edit below this line/////////////////


				var ie4=document.all&&!document.getElementById;
				var DOM2=document.getElementById;
				var faderdelay=0;
				var index=0;


				/*Rafael Raposo edited function*/
				//function to change content
				function changecontent(){
				  if (index>=fcontent.length)
				    index=0
				  if (DOM2){
				    document.getElementById("fscroller").style.color="rgb("+startcolor[0]+", "+startcolor[1]+", "+startcolor[2]+")"
				    document.getElementById("fscroller").innerHTML=begintag+fcontent[index]+closetag
				    if (fadelinks)
				      linkcolorchange(1);
				    colorfade(1, 15);
				  }
				  else if (ie4)
				    document.all.fscroller.innerHTML=begintag+fcontent[index]+closetag;
				  index++
				}

				// colorfade() partially by Marcio Galli for Netscape Communications.  ////////////
				// Modified by Dynamicdrive.com

				function linkcolorchange(step){
				  var obj=document.getElementById("fscroller").getElementsByTagName("A");
				  if (obj.length>0){
				    for (i=0;i<obj.length;i++)
				      obj[i].style.color=getstepcolor(step);
				  }
				}

				/*Rafael Raposo edited function*/
				var fadecounter;
				function colorfade(step) {
				  if(step<=maxsteps) {	
				    document.getElementById("fscroller").style.color=getstepcolor(step);
				    if (fadelinks)
				      linkcolorchange(step);
				    step++;
				    fadecounter=setTimeout("colorfade("+step+")",stepdelay);
				  }else{
				    clearTimeout(fadecounter);
				    document.getElementById("fscroller").style.color="rgb("+endcolor[0]+", "+endcolor[1]+", "+endcolor[2]+")";
				    setTimeout("changecontent()", delay);
					
				  }   
				}

				/*Rafael Raposo's new function*/
				function getstepcolor(step) {
				  var diff
				  var newcolor=new Array(3);
				  for(var i=0;i<3;i++) {
				    diff = (startcolor[i]-endcolor[i]);
				    if(diff > 0) {
				      newcolor[i] = startcolor[i]-(Math.round((diff/maxsteps))*step);
				    } else {
				      newcolor[i] = startcolor[i]+(Math.round((Math.abs(diff)/maxsteps))*step);
				    }
				  }
				  return ("rgb(" + newcolor[0] + ", " + newcolor[1] + ", " + newcolor[2] + ")");
				}

				if (ie4||DOM2)
				  document.write('<div id="fscroller" style="min-height:60px;width:'+fwidth+';height:'+fheight+'"></div>');

				if (window.addEventListener)
				window.addEventListener("load", changecontent, false)
				else if (window.attachEvent)
				window.attachEvent("onload", changecontent)
				else if (document.getElementById)
				window.onload=changecontent

				</script>
				
				<div style="margin-top:-1%;"/>
			</blockquote>
		</div><!-- end quovolver -->
	</div>
                        
  <div class="decor-header"></div>
                 <!--////////////////////////////////// END QUOVOLVER///////////////////////////////-->