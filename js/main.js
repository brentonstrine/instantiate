$(document).ready(function(){
// Login Form
// Make placeholder text work in bad browsers, and blue in good ones.
	//$("#login").on("focus", ".username", function(){
	//	$this = $(this);
	//	placeholder = $this.attr("placeholder");
	//	if($this.val()==placeholder){$this.val("");}
	//});




// -------------------------------
// Validation Listeners and Plugin
// -------------------------------

// Error Tip
var $tip = false;

//listen to elements with a tip attribute
$("form").on("focus mouseenter", "[data-errMsg]", function(){
	var $elem = $(this);
	var $offset = $elem.offset();
	
	//create tip if it doesn't exist yet
	if(!$tip){
		$("body").append("<div id='tip'></div>");
		$tip = $("#tip");
	}
	$tip.html($elem.attr("data-errMsg"));
	$offset.top -= $tip.outerHeight() + 10;
	$tip.html($elem.attr("data-errMsg")).css({
		'top': $offset.top,
		'left': $offset.left});
}).on("blur mouseleave", "[data-errMsg]", function(){
	if ( !$(this).is(":focus") ) {
		hideTip();
	}
});
function hideTip(){if($tip){$tip.css({'top': '-999px', 'left': '-999px'});}}

//Listen to all inputs and validate on blur
$("form.validate").on("blur", ":input", function(){$(this).validate();});

// Listen to forms that have been identified as having errors and revalidate per keystroke.
$("form").on("keyup", ".error", function(){$(this).validate();});


// Validation Plugin
// .validate()
(function($) {
	$.fn.validate = function() {
		// passedValidation() 
		var passedValidation = function($elem){
			$elem.removeClass("error");
			$elem.removeAttr("data-errMsg");
			hideTip();

			//Briefly flash green to indicate validation succeeded
			$elem.css({
				//'transition': 'border-color .05s, box-shadow .05s', //even a brief fading in was making it feel a little clunky
				'border-color': 'green',
				'box-shadow': '0 0 0 2px green'
			});
			setTimeout(function(){$elem.css({'transition': 'border-color .9s, box-shadow .9s','border-color': '#ccc','box-shadow': '0 0 0 0px #fff'})}, 10);
						setTimeout(function(){$elem.attr("style","")}, 900);
		}

		// failedValidation() 
		var failedValidation = function($elem, msg){
			$elem.addClass("error");
			$elem.attr("data-errMsg", msg);
			$elem.trigger("mouseenter");
		}

		//do the actual validation
		return this.each(function() {
			var $elem = $(this);
			
		//console.log.apply(console, $elem)
			
			//required field is empty
			if ($elem.hasAttr("required") && $elem.val()==""){
				failedValidation($elem, "This field is required and may not be empty.");
			}

			//run an arbitrary function
			else if( $elem.hasAttr("data-func") && !eval($elem.attr("data-func")) ){
				
				//the function will trigger an error if needed.
			}
			
			//fails to match pattern
			else if(($elem.hasAttr("pattern")||$elem.hasAttr("data-pattern"))&&($elem.val().search($elem.attr("pattern"))||$elem.val().search($elem.attr("data-pattern")))){
				var errorMessage = ($elem.hasAttr("data-pattern-desc")) ? $elem.attr("data-pattern-desc") : "There is a problem with this as it is entered.";
				failedValidation($elem, errorMessage);
			}
			
			//need to run ajax validation
			else if($elem.hasAttr("data-ajax-validate")){
				$.post("ajax/" + $elem.attr("data-ajax-validate") + ".php",{userInput: $elem.val()},function(response){
					//fails ajax validation
					if (!response.passedValidation) {
						failedValidation($elem, response.desc);
					}
					//passed ajax validation
					else {
						passedValidation($elem);
					}
				},"json");
			}
			
			//no ajax validation running, all validation passed
			else {
				passedValidation($elem);
			}
		});
	};
})(jQuery);

//Arbitrary functions run from within the Validation plugin

//Confirm that text in current element matches a specified element
function reType($elem, $origElem) {
	//matches
	if($elem.val() == $origElem.val()){
		return true;
	//failed to match
	} else {
		$elem.addClass("error");
		$elem.attr("data-errMsg", "This field must match the specified field exactly.");
		return false;
	}
}

//Use built-in browser validation for email
function emailCheck($elem) {
	if($elem[0].checkValidity()){
		return true;
	} else {
		$elem.addClass("error");
		$elem.attr("data-errMsg", "Must be a valid email address.");
		return false;	
	}
}

//copy value to specified element
function duplicate($elem, $targetElem) {
	$targetElem.val($elem.val());
	return true;
}

//remove non-digit characters from value to simplify validation in some cases (e.g. makes 123-45-678 equal to 12345678)
function stripSpecial($elem) {
	console.log($elem.val());
	$elem.val($elem.val().replace(/\D/g,""));
	
	console.log($elem.val());
	return true;
}


// ------------------------
//Additional Jquery Plugins
// ------------------------

// .hasAttr() Plugin
(function($){$.fn.hasAttr = function(name){return this.attr(name) !== undefined;};})(jQuery);

































// end jQuery
});