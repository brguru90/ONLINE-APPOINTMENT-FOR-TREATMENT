<style>
body{zoom:90%;}
.top-nav ul li a{
    font-family:"guru0";
	font-weight:normal;
}
h3{ font-family:"guru0";}
</style>
<ul class="nav1">
						<li id="11"><a id="1" href="home.php" data-hover="Home">Home</a></li>
						<li id="22"><a id="2" href="view.php" data-hover="View">view</a></li>					
						<li id="33"><a id="3" href="spreadsheet.php" data-hover="spreadsheet">spreadsheet</a></li>
						<li id="44"><a id="4" href="modify.php" data-hover="modify">modify</a></li>
						<li id="55"><a id="5" href="about.php" data-hover="about">about</a></li>
</ul>
<!-----------------------svg text------------------------------->
<svg viewbox="4 0 100 100" style='width:10%;position:fixed;left:0px;top:94.5%;z-index:99;'>
  <defs>
    <mask id="mask" x="0" y="0" width="100px" height="40">
      <rect x="0" y="0" width="82" height="25" fill="#fff"/>
      <text style='font-family:guru12;font-size:20px;font-weight:bold;' text-anchor="middle" x="28" y="22" dy="1">GPT</text>
      <text style='font-size:14px;' text-anchor="middle" x="66" y="22" dy="1">Sorab</text>
    </mask>
  </defs>
  <rect x="5" y="5" width="100" height="30" mask="url(#mask)" fill-opacity="0.5"/>    
</svg>
<script>
var a=document.getElementById("title").innerHTML;
switch (a)
{
	case 'HOME':document.getElementById("11").innerHTML='<a id="1" href="home.php" class="active" data-hover="Home">Home</a>';
				break;
	case 'view':document.getElementById("22").innerHTML='<a id="2" href="view.php" class="active" data-hover="view">view</a>';
	case 'view staff wise':document.getElementById("22").innerHTML='<a id="2" href="view.php" class="active" data-hover="view">view</a>';
	case 'view course wise':document.getElementById("22").innerHTML='<a id="2" href="view.php" class="active" data-hover="view">view</a>';
	case 'view subject wise':document.getElementById("22").innerHTML='<a id="2" href="view.php" class="active" data-hover="view">view</a>';
				break;
	case 'spreadsheet':document.getElementById("33").innerHTML='<a id="3" href="spreadsheet.php" class="active" data-hover="spreadsheet">spreadsheet</a>';
				break;
	case 'upload':document.getElementById("33").innerHTML='<a id="3" href="spreadsheet.php" class="active" data-hover="spreadsheet">spreadsheet</a>';
				break;	
	case 'download':document.getElementById("33").innerHTML='<a id="3" href="spreadsheet.php" class="active" data-hover="spreadsheet">spreadsheet</a>';
				break;
	case 'modify':document.getElementById("44").innerHTML='<a id="4" href="modify.php" class="active" data-hover="modify">modify</a>';
				break;	
	case 'insert':document.getElementById("44").innerHTML='<a id="4" href="modify.php" class="active" data-hover="modify">modify</a>';
				break;
	case 'update':document.getElementById("44").innerHTML='<a id="4" href="modify.php" class="active" data-hover="modify">modify</a>';
				break;
	case 'delete':document.getElementById("44").innerHTML='<a id="4" href="modify.php" class="active" data-hover="modify">modify</a>';
				break;
	case 'about':document.getElementById("55").innerHTML='<a id="5" href="about.php" class="active" data-hover="about">about</a>';
				break;				
}
</script>
<script>
//--------------all--most--all
/*
document.body.onload=z();
document.body.onmousemove=z();
document.body.onmouseover=z();
document.body.onmouseout=z();
document.body.onclick=z();
*/
function z()
{
	alert("hai");

var v=window.devicePixelRatio;

//v=parseInt(62/v);
//document.getElementById("main").style.fontSize=v+"px";
}
</script>
<style>

</style>
<!-----------------------google search API-------------------------->
<script language=JavaScript>
/*
 * This is the function that actually highlights a text string by
 * adding HTML tags before and after all occurrences of the search
 * term. You can pass your own tags if you'd like, or if the
 * highlightStartTag or highlightEndTag parameters are omitted or
 * are empty strings then the default <font> tags will be used.
 */
function doHighlight(bodyText, searchTerm, highlightStartTag, highlightEndTag) 
{
  // the highlightStartTag and highlightEndTag parameters are optional
  if ((!highlightStartTag) || (!highlightEndTag)) {
    highlightStartTag = "<font style='color:blue; background-color:yellow;'>";
    highlightEndTag = "</font>";
  }
  
  // find all occurences of the search term in the given text,
  // and add some "highlight" tags to them (we're not using a
  // regular expression search, because we want to filter out
  // matches that occur within HTML tags and script blocks, so
  // we have to do a little extra validation)
  var newText = "";
  var i = -1;
  var lcSearchTerm = searchTerm.toLowerCase();
  var lcBodyText = bodyText.toLowerCase();
    
  while (bodyText.length > 0) {
    i = lcBodyText.indexOf(lcSearchTerm, i+1);
    if (i < 0) {
      newText += bodyText;
      bodyText = "";
    } else {
      // skip anything inside an HTML tag
      if (bodyText.lastIndexOf(">", i) >= bodyText.lastIndexOf("<", i)) {
        // skip anything inside a <script> block
        if (lcBodyText.lastIndexOf("/script>", i) >= lcBodyText.lastIndexOf("<script", i)) {
          newText += bodyText.substring(0, i) + highlightStartTag + bodyText.substr(i, searchTerm.length) + highlightEndTag;
          bodyText = bodyText.substr(i + searchTerm.length);
          lcBodyText = bodyText.toLowerCase();
          i = -1;
        }
      }
    }
  }
  
  return newText;
}


/*
 * This is sort of a wrapper function to the doHighlight function.
 * It takes the searchText that you pass, optionally splits it into
 * separate words, and transforms the text on the current web page.
 * Only the "searchText" parameter is required; all other parameters
 * are optional and can be omitted.
 */
function highlightSearchTerms(searchText, treatAsPhrase, warnOnFailure, highlightStartTag, highlightEndTag)
{
  // if the treatAsPhrase parameter is true, then we should search for 
  // the entire phrase that was entered; otherwise, we will split the
  // search string so that each word is searched for and highlighted
  // individually
  if (treatAsPhrase) {
    searchArray = [searchText];
  } else {
    searchArray = searchText.split(" ");
  }
  
  if (!document.body || typeof(document.body.innerHTML) == "undefined") {
    if (warnOnFailure) {
      alert("Sorry, for some reason the text of this page is unavailable. Searching will not work.");
    }
    return false;
  }
  
  var bodyText = document.body.innerHTML;
  for (var i = 0; i < searchArray.length; i++) {
    bodyText = doHighlight(bodyText, searchArray[i], highlightStartTag, highlightEndTag);
  }
  
  document.body.innerHTML = bodyText;
  return true;
}

/*
 * This function takes a referer/referrer string and parses it
 * to determine if it contains any search terms. If it does, the
 * search terms are passed to the highlightSearchTerms function
 * so they can be highlighted on the current page.
 */
function highlightGoogleSearchTerms(referrer)
{
  // This function has only been very lightly tested against
  // typical Google search URLs. If you wanted the Google search
  // terms to be automatically highlighted on a page, you could
  // call the function in the onload event of your <body> tag, 
  // like this:
  //   <body onload='highlightGoogleSearchTerms(document.referrer);'>
  
  //var referrer = document.referrer;
  if (!referrer) {
    return false;
  }
  
  var queryPrefix = "q=";
  var startPos = referrer.toLowerCase().indexOf(queryPrefix);
  if ((startPos < 0) || (startPos + queryPrefix.length == referrer.length)) {
    return false;
  }
  
  var endPos = referrer.indexOf("&", startPos);
  if (endPos < 0) {
    endPos = referrer.length;
  }
  
  var queryString = referrer.substring(startPos + queryPrefix.length, endPos);
  // fix the space characters
  queryString = queryString.replace(/%20/gi, " ");
  queryString = queryString.replace(/\+/gi, " ");
  // remove the quotes (if you're really creative, you could search for the
  // terms within the quotes as phrases, and everything else as single terms)
  queryString = queryString.replace(/%22/gi, "");
  queryString = queryString.replace(/\"/gi, "");
  
  return highlightSearchTerms(queryString, false);
}


/*
 * This function is just an easy way to test the highlightGoogleSearchTerms
 * function.
 */
function testHighlightGoogleSearchTerms()
{
  var referrerString = "http://www.google.com/search?q=javascript%20highlight&start=0";
  referrerString = prompt("Test the following referrer string:", referrerString);
  return highlightGoogleSearchTerms(referrerString);
}
</script>