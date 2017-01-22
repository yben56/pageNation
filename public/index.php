<?PHP require_once("../app/libs/pagenation.php"); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Heebo:100,300,500" rel="stylesheet">
<link href="css/main.css" type="text/css" rel="stylesheet" />

<div class="container">
	<div class="row">
    	<div class="title">PAGE NATiON</div>
        <p>- A simple PHP pagination with Bootstrap style -</p>
    </div>
	<div class="row"><?PHP pageNation(9, "page", "?page="); ?></div>
    <div class="row"><?PHP pageNation(9, "page", "?page=", "pagination-sm"); ?></div>
    <div class="row"><?PHP pageNation(9, "page", "?page=", "pagination-sm", "Previous", "Next"); ?></div>
</div>