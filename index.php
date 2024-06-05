<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD using Function</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- header -->

    <div class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">CRUD using Function</h1>
                <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Home</a>
            </div>
        </div>
    </div>

    <div class="flex-1 flex px-[10%] py-10 gap-4">
        <div class="w-3/12">
            <div class="border p-4">
                <form action="" method="post">
                    <div class="mb-3 flex flex-col">
                        <label for="">Name</label>
                        <input type="text" name="name" class="border px-3 py-2">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="">contact</label>
                        <input type="text" name="contact" class="border px-3 py-2">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="">email</label>
                        <input type="text" name="email" class="border px-3 py-2">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <input type="submit" name="send" class="bg-teal-600 w-full text-white px-3 py-2">
                    </div>
                </form>
                <?php 
                if(isset($_POST['send'])){
                    $records = [
                        "name" => $_POST['name'],
                        "contact" => $_POST['contact'],
                        "email" => $_POST['email'],
                    ];

                    if(insertData("vcard",$records)){
                        redirect('index.php');
                    }
                    else{
                        echo "<script>alert('insert data failed')</script>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="w-9/12">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="border p-2">Id</th>
                        <th class="border p-2">Name</th>
                        <th class="border p-2">Contact</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $records = callingData('vcard');
                        foreach($records as $record):
                    ?>
                    <tr>
                        <td class="border p-2"><?= $record['id'];?></td>
                        <td class="border p-2"><?= $record['name'];?></td>
                        <td class="border p-2"><?= $record['contact'];?></td>
                        <td class="border p-2"><?= $record['email'];?></td>
                        <td class="border p-2 flex justify-center gap-2">
                            <a href="index.php?id=<?= $record['id'];?>" class="bg-red-600 text-white px-3 py-2 rounded">Delete</a>
                            <a href="" class="bg-green-600 text-white px-3 py-2 rounded">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(deleteData("vcard","id='$id'")){
        redirect('index.php');
    }
}
?>