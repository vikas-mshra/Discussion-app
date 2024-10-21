<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading">Question</h1>
            <?php
            include('./common/db.php');
            $query = "SELECT * FROM questions WHERE id = $qid";
            $result = $conn->query($query);

            $row = $result->fetch_assoc();
            $cid = $row['category_id'];
            echo "
            <h4 class='margin-bottom-15 question-title'>Question: " . $row['title'] . "</h4>
            <p class='margin-bottom-15'>" . $row['description'] . "</p>
        ";
            include('./client/answer.php');
            ?>
            <form method="POST" action="./server/requests.php">
                <input type="hidden" name="question_id" value="<?php echo $qid; ?>">
                <textarea class="form-control margin-bottom-15" name="answer" rows="5" placeholder="Write your answer"></textarea>
                <button class="btn btn-primary" type="submit">Answer</button>
            </form>
        </div>
        <div class="col-4">
            <?php
            $categoryQuery = "SELECT * FROM category WHERE id = $cid";
            $result = $conn->query($categoryQuery);
            $row = $result->fetch_assoc();
            echo "<h1>" . ucfirst($row['name']) . "</h1>";

            $query = "SELECT * FROM questions WHERE category_id = $cid and id != $qid";
            $result = $conn->query($query);
            foreach ($result as $row) {
                $id = $row['id'];
                $title = $row['title'];

                echo "
                    <div class='question-list'>
                        <h4><a href=?q-id=$id>$title</a></h4>
                    </div>
                ";
            }
            ?>
        </div>
    </div>
</div>