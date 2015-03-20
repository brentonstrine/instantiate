<!DOCTYPE html>
<html>
<head>
<title>Instantiate! Demo Registration.</title>
<!-- Load CSS first to allow parallel downloading -->
	<!-- main CSS --><link href="css/main.css" rel="stylesheet">
	<!--[if lt IE 9]><link href="css/ltIE9.css" rel="stylesheet"><![endif]-->
<!-- Load Javascript -->
	<!-- jQuery   --><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
	<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
	<!-- main JS --><script src="js/main.js" ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("form").on("blur", ":input", function(){
				$(this).validate();
			});
		});
	</script>
</head>
<body>
<div id="container">
	<header>
		<h1>Instantiate!</h1>
		<h2 class="subheader">Instant Form Validation</h2>
	</header>
	<form class="main form validate">
		<h1>Registration Demonstaration</h1>
		<div class="row">
			<p>This is an example of a registration form using <b>Instantiate!</b> to validate forms as you go.</p>
		</div>

		<h2><span class="small">Create an account</span></h2>


		<div class="control row">
			<label>Full Legal Name</label>
			<div class="controls">
				<input type="text" placeholder="First Name" class="medium" id="firstName" name="firstName" required pattern="^[a-zA-Z]+$">
				<input type="text" placeholder="M.I." class="small" id="mI" name="mI" required pattern="^[a-zA-Z]\.?$">
				<input type="text" placeholder="Last Name" class="medium" id="lastName" name="lastName" required pattern="[a-zA-Z]+">
			</div>
		</div>


		<div class="control row">
			<label>Date of Birth</label>
			<div class="controls">
				<input type="date" class="large" id="dob" name="dob"
				       required
				       data-placeholder="MM/DD/YYYY"
				       data-pattern="(^(0?[1-9]|1[0-2])[\-\\/](0?[1-9]|[1-2][0-9]|3[0-1])[\-\\/][1-2]([0-9]{3})$)|(^[1-2]([0-9]{3})[\-\\/](0?[1-9]|1[0-2])[\-\\/](0?[1-9]|[1-2][0-9]|3[0-1])$)"
				       data-pattern-desc="Date must be in MM/DD/YYYY format and you must be at least 21 years old."
				       max="<?php echo date('Y-m-d', strtotime('now -21 year')); ?>"
				       data-ajax-validate="over21">
			</div>
		</div>
		<div class="row">
			<p class="note">*Must be 21 years of age to register</p>
		</div>
		<div class="control row">
			<label>Create a Username</label>
			<div class="controls">
				<input type="text" class="large" id="username" name="username"
				        placeholder="Enter username"
					required
					pattern="[a-zA-Z][a-zA-Z0-9-_\.]{7,}"
					data-pattern-desc="Must start with a letter, be a minimum of 8 characters. Only numbers and letters are allowed."
					data-ajax-validate="username"
					>
					<div class="validation username"></div>
				<p class="tip">Minimum of 8 characters</p>
			</div>
		</div>
		<div class="control row">
			<p class="note">Password must be minimum of 8 characters, contain at lease 1 each of uppercase, lowercase and numerical characters.</p>
		</div>
		<div class="control row">
			<label>Choose a password</label>
			<div class="controls">
				<input type="password" class="full" id="password" name="password"
					placeholder="Enter password"
					required
					pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
					data-pattern-desc="Password must be at lesat 8 characters long, and must contain at least one number, one lowercase letter, and one uppercase letter.">
					<div class="validation password"></div>
			</div>
		</div>
		<div class="control row">
			<label>Re-enter password</label>
			<div class="controls">
				<input type="password" class="full" id="passwordVerify" name="passwordVerify"
					placeholder="Re-enter password"
					required
					data-func="reType($elem, $('#password'));">
			</div>
		</div>
		<div class="control row">
			<label>Enter email address</label>
			<div class="controls">
				<input type="email" class="full" id="email" name="email"
					placeholder="example@domain.com"
					required
					data-func="emailCheck($elem)"
					data-ajax-validate="email">
			</div>
		</div>
		<div class="control row">
			<label>Re-enter email address</label>
			<div class="controls">
				<input type="email" class="full" id="emailVerify" name="emailVerify"
					placeholder="example@domain.com"
					required
					data-func="reType($elem, $('#email'));">
			</div>
		</div>
		<div class="control row">
			<label>Security question</label>
			<div class="controls">
				<input type="text" class="full" id="securityQuestion" name="securityQuestion" placeholder="Write custom question here" required>
			</div>
		</div>
		<div class="control row">
			<label>Security answer</label>
			<div class="controls">
				<input type="text" class="full" id="securityAnswer" name="securityAnswer" placeholder="Custom answer" required>
			</div>
		</div>
		<div class="control row">
			<label>Security validation</label>
			<div class="controls">
				<div id="reCaptcha"><img src="img/recaptcha.png" alt="dummy reCaptcha"></div>
			</div>
		</div>

		<h1>Personal Information</h1>
		<h2><span class="small">Please enter your personal details</span></h2>
		<div class="control row">
			<label for="address1">Address Line 1</label>
			<div class="controls">
				<input type="text" class="full" id="address1" name="address1"
					placeholder="1234 Example Street"
					required
					data-func="duplicate($elem, $('#billingAddress1'))">
				<p class="tip">Street address / P.O. box / Company name /cfo</p>
			</div>
		</div>
		<div class="control row">
			<label for="address2">Address Line 2</label>
			<div class="controls">
				<input type="text" class="full" id="address2" name="address2"
					placeholder="Apt# 123"
					data-func="duplicate($elem, $('#billingAddress2'))">
				<p class="tip">Apartment suite, unit, building, floor etc..</p>
			</div>
		</div>
		<div class="control row">
			<label for="city">City</label>
			<div class="controls">
				<input type="text" class="large" id="city" name="city"
				        placeholder="San Fransisco"
					required
					data-func="duplicate($elem, $('#billingCity'))">
			</div>
		</div>
		<div class="control row">
			<label for="state">State/Province/Region</label>
			<div class="controls">
				<input type="text" class="large" id="state" name="state"
				        placeholder="California"
					required
					data-func="duplicate($elem, $('#billingState'))">
			</div>
		</div>
		<div class="control row">
			<label for="zip">ZIP</label>
			<div class="controls">
				<input type="text" class="medium" id="zip" name="zip"
				        placeholder="55555-555"
					required
					data-func="duplicate($elem, $('#billingZip'))">
			</div>
		</div>
		<div class="control row">
			<label for="country">Country</label>
			<div class="controls">
				<input type="text" class="large" id="country" name="country"
					placeholder="USA"
					required
					data-func="duplicate($elem, $('#billingCountry'))">
			</div>
		</div>
		<div class="control row">
			<label for="ssn">Social Security No.</label>
			<div class="controls">
				<input type="text" class="large" id="ssn" name="ssn"
					placeholder="000-00-000"
					required
					data-ajax-validate="validSSN"
					pattern="^(\d{3}-*?\d{2}-*?\d{4})$"
					data-pattern-desc="Must be a valid Social Security number, e.g. 555-55-5555.">
			</div>
		</div>
		<div class="control row">
			<p class="label full">You have not been a target of a federal investigation?</p>
			<div class="controls full">
				<label for="self-excluded-true" ><input type="radio" name="self-excluded" value="true"  id="self-excluded-true" required> Yes</label>
				<label for="self-excluded-false"><input type="radio" name="self-excluded" value="false" id="self-excluded-false" required> No</label>
			</div>
		</div>
		<div class="control row">
			<p class="label full">Have you ever eaten a raw egg?</p>
			<div class="controls full">
				<label for="banned-true" ><input type="radio" name="banned" value="true"  id="banned-true"  required> Yes</label>
				<label for="banned-false"><input type="radio" name="banned" value="false" id="banned-false" required> No</label>
			</div>
		</div>
		<!--<a class="sprite next" href="registration2.php">Next</a>-->

		<!-- "Page" 2 -->
		<h1>Credit/Debit Card Information</h1>
		<h2><span class="small">Please enter your card details</span></h2>

		<div class="control row">
			<label>Card Number</label>
			<div class="controls">
				<input type="text" class="full" id="ccNumber" name="ccNumber"
					placeholder="5555-5555-5555-5555"
					required
					pattern="[0-9]{13,16}"
					data-pattern-desc="Must be a valid credit card number."
					data-func="stripSpecial($elem)">
			</div>
		</div>
		<div class="control row">
			<label>Expiration Date</label>
			<div class="controls">
				<input type="text" class="small" id="cardExpDD" name="cardExpDD" placeholder="DD" required>
				<input type="text" class="small" id="cardExpMM" name="cardExpMM" placeholder="MM" required>
				<input type="text" class="small" id="cardExpYYYY" name="cardExpYYYY" placeholder="YYYY" required>
			</div>
		</div>
		<div class="control row">
			<label>Cardhodler Name</label>
			<div class="controls">
				<input type="text" class="full" id="cardName" name="cardName" placeholder="First and Last Name on Card" required>
				<p class="tip">*As appears on the card</p>
			</div>
		</div>
		<div class="control row">
			<label>CV2</label>
			<div class="controls">
				<input type="text" class="small" id="cardCV2" name="cardCV2"
				       placeholder="###"
				       pattern="^/d{3}$"
				       data-pattern-desc="Must be 3 digits.">
			</div>
		</div>
		<h3 class="nsote">Enter billing address associated with the card</h3>
		<div class="control row">
			<p class="label inline" style="padding-right:300px">Billing is the same as home address</p>
			<div class="controls inline">
				<label for="billingSame-true" ><input type="radio" name="billingSame" value="true"  id="billingSame-true" > Yes</label>
				<label for="billingSame-false"><input type="radio" name="billingSame" value="false" id="billingSame-false"> No</label>
			</div><div class="clearfix"></div>
		</div>
		<div class="control row">
			<label for="address1">Address Line 1</label>
			<div class="controls">
				<input type="text" class="full" id="billingAddress1" name="billingAddress1" placeholder="1234 Example Street">
				<p class="tip">Street address / P.O. box / Company name /cfo</p>
			</div>
		</div>
		<div class="control row">
			<label for="address2">Address Line 2</label>
			<div class="controls">
				<input type="text" class="full" id="billingAddress2" name="billingAddress2" placeholder="Apt# 123">
				<p class="tip">Apartment suite, unit, building, floor etc..</p>
			</div>
		</div>
		<div class="control row">
			<label for="city">City</label>
			<div class="controls">
				<input type="text" class="large" id="billingCity" name="billingCity" placeholder="San Fransisco">
			</div>
		</div>
		<div class="control row">
			<label for="state">State/Province/Region</label>
			<div class="controls">
				<input type="text" class="large" id="billingState" name="billingState" placeholder="California">
			</div>
		</div>
		<div class="control row">
			<label for="zip">ZIP</label>
			<div class="controls">
				<input type="text" class="medium" id="billingZip" name="billingZip" placeholder="55555-555">
			</div>
		</div>
		<div class="control row">
			<label for="country">Country</label>
			<div class="controls">
				<input type="text" class="large" id="billingCountry" name="billingCountry" placeholder="USA">
			</div>
		</div>


		<div class="control row">
			<label>Phone</label>
			<div class="controls">
				<input type="tel" class="large" id="billingPhone" name="billingPhone" placeholder="###-###-####">
			</div>
		</div>

		<h1>Deposit Your Account</h1>
		<h2><span class="small">Enter desired amount to deposit your account or select the minimum deposit of $10.00</span></h2>
		<div class="control row">
			<p class="note">You may not deposit more than $5000 for the first 30 days from the initial registration date</p>
		</div>
		<div class="control row">
			<label class="label inline" for="depositAmount">Amount</label>
			<div class="controls inline showDollar">
				<input type="text" name="depositAmount" id="depositAmount" style="text-align: right;" class="medium" pattern="^\d+(\.|\,)\d{2}$">
			</div>
			<p class="label inline">OR</p>
			<div class="controls inline">
				<label for="min10" ><input type="checkbox" name="min10" value="true"  id="min10" > Minimum deposit of $10.00</label>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="control row small">
			<p><label for="auth" ><input type="checkbox" name="auth" value="true"  id="auth" > I hereby authorize a deposit and transaction to my account</label></p>
			<div class="clearfix"></div>
		</div>

		<!--<a class="sprite back" href="registration.php">Back</a>
		<a class="sprite next" href="registration3.php">Next</a>-->

		<!-- "Page" 3 -->
				<h1>Agreements</h1>
		<h2><span class="small">Read and accept to register</span></h2>
		<div class="control row">
			<div class="fineprint">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam odio ante, vulputate sed eleifend ut, egestas sed sapien. Sed in eros ut diam faucibus laoreet. Proin leo eros, varius ut scelerisque sit amet, tempus non justo. In quis massa odio, ac condimentum libero. Etiam fringilla sem in turpis ultricies et viverra ante porttitor. Vivamus ac condimentum magna. Mauris nec diam a velit pellentesque vestibulum. Morbi placerat mi id lorem feugiat vulputate. In quis neque libero. Phasellus dictum, orci ut sodales bibendum, turpis sapien condimentum felis, nec aliquet diam metus sit amet nunc. Praesent tristique malesuada lectus, a volutpat lorem rutrum vitae. Nulla at mauris et est consequat suscipit.</p>
				<p>Etiam sit amet imperdiet nisi. Curabitur fermentum magna sit amet lectus molestie non ornare sem posuere. Sed nulla neque, eleifend ut pharetra et, vulputate ac justo. Donec auctor dolor sed arcu vehicula at dapibus tellus tincidunt. Fusce vulputate, quam vitae aliquet gravida, quam eros dapibus ligula, tempor aliquet sapien massa in mi. Phasellus in odio diam, ut egestas ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin eleifend sem a dolor cursus eget vestibulum lorem tincidunt. Proin sit amet libero neque, sed viverra massa. Sed at metus sed eros ornare consequat et vitae metus. Sed non justo ante.</p>
				<p>Nulla facilisi. Sed tincidunt risus nec nisi bibendum ultricies. Vestibulum pharetra diam consequat turpis congue tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, nisl sed laoreet dapibus, nisi lorem auctor ligula, sit amet tempus magna nunc at mi. Maecenas velit ligula, porttitor eu tristique sit amet, pharetra ac lorem. In hac habitasse platea dictumst. Cras ac porta turpis. Maecenas suscipit enim at odio vestibulum venenatis et quis elit. Pellentesque nibh velit, gravida eget feugiat a, laoreet eu neque. Duis vitae dolor et massa aliquet sollicitudin nec vitae justo. Pellentesque eleifend mi a risus semper pharetra. Aenean tempor imperdiet luctus. Mauris pharetra condimentum molestie. Proin scelerisque ornare massa, ac pharetra augue semper et.</p>
				<p>Integer ac tortor a massa gravida fermentum eu quis dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec aliquam odio et risus rutrum ornare. Suspendisse potenti. In sed diam et lacus commodo accumsan. Nunc in purus justo, eget suscipit enim. Vivamus fringilla aliquam nibh ac euismod. Vestibulum ultrices lorem at ipsum dictum sed facilisis risus tincidunt. Praesent pellentesque placerat lorem, et imperdiet sem gravida nec. Suspendisse potenti. Nunc eu varius justo. Ut et pulvinar urna.</p>
				<p>Ut magna turpis, feugiat in dictum a, aliquam vitae nunc. Duis eget libero a neque dictum faucibus sed laoreet nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus rutrum sollicitudin metus id facilisis. Duis dignissim sem vel arcu lacinia lobortis. Proin tempor dictum elit, vitae vehicula quam porttitor eget. Duis at erat ante, non gravida odio. Aenean nec urna a dolor posuere posuere et sit amet mauris. Praesent vehicula lacinia magna, a dictum enim mattis ut.</p>
			</div>
		</div>
		<div class="control row small">
			<p><label for="readTOS" ><input type="checkbox" name="readTOS" value="true"  id="readTOS" > I agree with the Terms and Conditions of Service</label></p>
			<div class="clearfix"></div>
		</div>
		<div class="control row">
			<div class="fineprint">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam odio ante, vulputate sed eleifend ut, egestas sed sapien. Sed in eros ut diam faucibus laoreet. Proin leo eros, varius ut scelerisque sit amet, tempus non justo. In quis massa odio, ac condimentum libero. Etiam fringilla sem in turpis ultricies et viverra ante porttitor. Vivamus ac condimentum magna. Mauris nec diam a velit pellentesque vestibulum. Morbi placerat mi id lorem feugiat vulputate. In quis neque libero. Phasellus dictum, orci ut sodales bibendum, turpis sapien condimentum felis, nec aliquet diam metus sit amet nunc. Praesent tristique malesuada lectus, a volutpat lorem rutrum vitae. Nulla at mauris et est consequat suscipit.</p>
				<p>Etiam sit amet imperdiet nisi. Curabitur fermentum magna sit amet lectus molestie non ornare sem posuere. Sed nulla neque, eleifend ut pharetra et, vulputate ac justo. Donec auctor dolor sed arcu vehicula at dapibus tellus tincidunt. Fusce vulputate, quam vitae aliquet gravida, quam eros dapibus ligula, tempor aliquet sapien massa in mi. Phasellus in odio diam, ut egestas ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin eleifend sem a dolor cursus eget vestibulum lorem tincidunt. Proin sit amet libero neque, sed viverra massa. Sed at metus sed eros ornare consequat et vitae metus. Sed non justo ante.</p>
				<p>Nulla facilisi. Sed tincidunt risus nec nisi bibendum ultricies. Vestibulum pharetra diam consequat turpis congue tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, nisl sed laoreet dapibus, nisi lorem auctor ligula, sit amet tempus magna nunc at mi. Maecenas velit ligula, porttitor eu tristique sit amet, pharetra ac lorem. In hac habitasse platea dictumst. Cras ac porta turpis. Maecenas suscipit enim at odio vestibulum venenatis et quis elit. Pellentesque nibh velit, gravida eget feugiat a, laoreet eu neque. Duis vitae dolor et massa aliquet sollicitudin nec vitae justo. Pellentesque eleifend mi a risus semper pharetra. Aenean tempor imperdiet luctus. Mauris pharetra condimentum molestie. Proin scelerisque ornare massa, ac pharetra augue semper et.</p>
				<p>Integer ac tortor a massa gravida fermentum eu quis dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec aliquam odio et risus rutrum ornare. Suspendisse potenti. In sed diam et lacus commodo accumsan. Nunc in purus justo, eget suscipit enim. Vivamus fringilla aliquam nibh ac euismod. Vestibulum ultrices lorem at ipsum dictum sed facilisis risus tincidunt. Praesent pellentesque placerat lorem, et imperdiet sem gravida nec. Suspendisse potenti. Nunc eu varius justo. Ut et pulvinar urna.</p>
				<p>Ut magna turpis, feugiat in dictum a, aliquam vitae nunc. Duis eget libero a neque dictum faucibus sed laoreet nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus rutrum sollicitudin metus id facilisis. Duis dignissim sem vel arcu lacinia lobortis. Proin tempor dictum elit, vitae vehicula quam porttitor eget. Duis at erat ante, non gravida odio. Aenean nec urna a dolor posuere posuere et sit amet mauris. Praesent vehicula lacinia magna, a dictum enim mattis ut.</p>
			</div>
		</div>
		<div class="control row small">
			<p><label for="pirvPol"><input type="checkbox" name="pirvPol" value="true" id="pirvPol" > I agree to the Privacy Policy</label></p>
			<div class="clearfix"></div>
		</div>
		<!--<a class="sprite back" href="registration2.php">Back</a>-->
		<a class="sprite next" href="#">Create Account</a>
		<br>
	</form>
</div>
</body>
</html>
