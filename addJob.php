<?php

use App\Models\Job;

if(!empty($_POST)){
    $job = new Job();
    $job->title =$_POST['title'];
    $job->description =$_POST['description'];
    $job->save();
}



?>

<Html>
    <Head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
            crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <Title>Add Job</Title>
    </Head>
    <Body>
        <h1>Add Job</h1>
        <Form Action="addJob.php" method="post">
                <label for="">Title:</label>
                <Input type="text" name = "title"></Input><br>
                <label for="">Description:</label>
                <Input type="text" name="description"></Input><br>
                <Button type="submit">Save</Button>
        </Form>
    </Body>
</Html>