<?php
    include_once './Library/HTMLDefualt.php';
    include_once './Library/DataBase.php';
?>

<?php
start_page("Messages");
menu();
if(!isset($_SESSION['username']))
{
    header("Location: login.php");
}

#cuurent user
$username = $_SESSION['username'];
$iduser = $_SESSION['iduser'];

#initialize  database connection
$db = new DataBase();
$result = -1;
?>

<?php
        if(isset($_POST['username']))
        {
            $send_to = $_POST['username'];
            
            $result = $db->result("SELECT iduser FROM users WHERE username ='".$send_to."'");
            
            if($result != NULL && $row = mysql_fetch_assoc($result))
            {
                $id_send_to = $row['iduser'];
                $subject = $_POST['subject'];
                $content = $_POST['content'];
                
                $db->insert("INSERT INTO messages (touser, fromuser, subject, content, recive) 
                             VALUES (".$id_send_to.", ".$iduser.", '".$subject."', '".$content."', NOW())");
                unset($_POST['username']);
                
                ?>
                    <script>
                        alert('Send message');
                    </script>
                <?php
            }
            else 
            {
                ?>
                    <script>
                        alert('the user <?php echo $send_to ?> don\'t exist');
                    </script>
                <?php
            }
        }
?>

<!-- Send messages section -->
<div id="divSendMessage">
    <form id="sendMessage" method="post" action="messages.php">
    <table>
        <tr>
            <td>
                To:
            </td>
            <td>
                <input type="text" 
                       name="username" 
                       required="enter destination" 
                       maxlength="40"
                       placeholder="Enter username">
            </td>
        </tr>
        <tr>
            <td>
                Subject:
            </td>
            <td>
                <input type="text" 
                       name="subject" 
                       required="enter subject" 
                       maxlength="40"
                       placeholder="Enter subject">
            </td>
        </tr>
        <tr>
            <td>
                Content:
            </td>
            <td>
                <textarea name="content" 
                          cols="40" 
                          rows="7" 
                          required="enter content"
                          placeholder="your message here"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Send">
            </td>
        </tr>
    </table>
    </form>
</div>

<!-- received messages -->
<div id="inbox">
    <h2>inbox</h2>
    <?php
        $result = $db->result("SELECT users.username AS sendby, messages.subject, messages.content
                               FROM messages INNER JOIN users
                               WHERE users.iduser = messages.fromuser AND messages.touser = ".$iduser." 
                               ORDER BY messages.recive DESC");
        
        $isColor = true;
        while($row = mysql_fetch_array($result))
        {
            ?>
             <div class=<?php  echo $isColor ? "div_message" : "div_message_1"; ?>>
                        <div class="div_subject">
                            Subject: <?php echo $row['subject']; ?>
                        </div>
                        <div class="div_from">
                            From: <?php echo $row['sendby'];?>
                        </div>
                        <div class="div_content">
                            Content: <?php echo $row['content'];?>
                        </div>
            </div>
            <?php
            
            $isColor = !$isColor;
        }
    ?>
</div>

<?php
    end_page();
?>
