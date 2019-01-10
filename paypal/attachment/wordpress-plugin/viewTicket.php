<?php
    require_once 'logincheck.php';
    require_once 'connection.php';

    function redirect() {
	    header('Location: manageTickets.php');
	    exit();
    }

    function createReply($data) {
        return '<div class="reply">
                    <span class="user">'.$data['name'].'</span>

                    <p>'.$data['reply'].'</p>
                </div>
                ';
    }

    if (!isset($_GET['id']))
        redirect();

    $ticketID = $conn->real_escape_string($_GET['id']);
    if ($_SESSION['isAdmin'])
        $sql = $conn->query("SELECT subject FROM supportTickets WHERE id='$ticketID'");
    else
        $sql = $conn->query("SELECT subject FROM supportTickets WHERE userID='$userID' AND id='$ticketID'");

    if ($sql->num_rows == 0)
        redirect();

	if (isset($_POST['saveReply'])) {
		$reply = $conn->real_escape_string(nl2br($_POST['reply']));

        $conn->query("INSERT INTO ticketReplies (ticketID, userID, reply) VALUES ('$ticketID', '$userID', '$reply')");
        $conn->query("UPDATE supportTickets SET status=1 WHERE id='$ticketID'");

        $sql = $conn->query("SELECT name FROM users WHERE id='$userID'");
        $data = $sql->fetch_array();
        $data['reply'] = $reply;

        $response = createReply($data);

        exit($response);
	}

	if (isset($_POST['viewReplies'])) {
		$start = $conn->real_escape_string( $_POST['start'] );

		$sql = $conn->query( "SELECT reply, name FROM ticketReplies
          INNER JOIN users ON ticketReplies.userID = users.id
          WHERE ticketID='$ticketID'
          LIMIT $start, 20;
        ");

		$response = "";
		while( $data = $sql->fetch_array() ) {
			$response .= createReply($data);
		}

		exit("$response");
	}

    $ticketData = $sql->fetch_array();

    $sql = $conn->query("SELECT id FROM ticketReplies WHERE ticketID = '$ticketID'");
    $max = $sql->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $ticketData['subject'] ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        .reply {
            background-color: #f8f8f8;
            padding: 20px;
            margin-top: 5px;
        }

        .user {
            color: blue;
        }

        textarea {
            margin-top: 10px;
            min-height: 150px;
        }
    </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php require_once "sidebar.php"; ?>

			<div class="col-md-9">
                <h2><?php echo $ticketData['subject'] ?></h2>

                <textarea class="form-control" placeholder="Write Reply"></textarea><br>
                <input type="button" class="btn btn-primary" id="replyBtn" value="Reply">
			</div>
		</div>
	</div>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#replyBtn").on('click', function () {
                $.ajax({
                    url: 'viewTicket.php?id=<?php echo $ticketID ?>',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        saveReply: 1,
                        reply: $('textarea').val()
                    }, success: function (response) {
                        $(response).insertBefore('textarea');
                        $("textarea").val("");
                    }
                });
            });

            loadReplies(0, <?php echo $max; ?>);
        });

        function loadReplies(start, max) {
            if (start > max)
                return;

            $.ajax({
                url: 'viewTicket.php?id=<?php echo $ticketID ?>',
                method: 'POST',
                dataType: 'text',
                data: {
                    viewReplies: 1,
                    start: start
                }, success: function (response) {
                    start += 20;
                    $(response).insertBefore('textarea');
                    loadReplies(start, max);
                }
            });
        }
    </script>
</body>
</html>