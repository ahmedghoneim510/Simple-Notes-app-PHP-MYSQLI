<?php
    include 'includes/auto_loader.php';
    $connect=new connection();
    $notes=$connect->GetNotes();
    $currrent_node=[
        ['id'=>'',
        'title' =>'',
        'description' =>'',]
    ];
    if(isset($_GET['id'])){
        // echo $_GET['id'].'<br/>';
        $currrent_node=$connect->GetNodeById($_GET['id']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
<div>
    <form class="new-note" action="classes/create.php" method="post">
        <input type="hidden" name="id" value="<?php echo $currrent_node[0]['id']; ?>">
        <input type="text" name="title" placeholder="Note title" value="<?php echo $currrent_node[0]['title']; ?>" autocomplete="off">
        <textarea name="description" cols="30" rows="4" placeholder="Note Description"><?php echo $currrent_node[0]['description']; ?></textarea  value="WE" > 
        <button>
            <?php if (($currrent_node[0]['id'])):?>
                Update Node
            <?php else: ?>
                New note
            <?php endif;?>
        </button>
    </form>
    <div class="notes">
        <?php foreach($notes as $note) :?>
        <div class="note">
            <div class="title">
                <a href="?id=<?php echo $note['id']; ?>"><?php echo $note['title']?></a>
            </div>
            <div class="description">
            <?php echo $note['description']?>
            </div>
            <small><?php echo $note['create_data']?></small>
            <form action="classes/delete.php" method="post">
                <input type="hidden" name='id' value=<?php echo $note['id']; ?> >
            <button class="close">X</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
