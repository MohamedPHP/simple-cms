
<?php include "includes/init.php" ?>



    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Posts
                    <small>Posts Page</small>
                </h1>
                <?php
                if (isset($_GET['q']) && $_GET['q'] != '') {
                    $keyword = strip_tags(trim($_GET['q']));
                    $sql = "SELECT * FROM posts WHERE title LIKE '%" . $keyword .  "%' OR content LIKE '%" . $keyword ."%'  ORDER BY id DESC";
                    $stmt = $conn->prepare($sql);
                }else {
                    $stmt = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
                }
                $stmt->execute();
                $posts = $stmt->fetchAll();
                $count = $stmt->rowCount();
                ?>
                <?php if ($count > 0): ?>
                    <?php foreach ($posts as $row): ?>
                        <h2>
                            <a href="#"><?php echo $row['title'] ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="#"><?php echo $row['author'] ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted <?php echo $row['date'] ?></p>
                        <hr>
                        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                        <hr>
                        <p><?php echo $row['content'] ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-danger">There is no data here</div>
                <?php endif; ?>
                <?php if ($count > 0): ?>
                    <!-- Pager -->
                    <ul class="pager">
                        <li class="previous">
                            <a href="#">&larr; Older</a>
                        </li>
                        <li class="next">
                            <a href="#">Newer &rarr;</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <div class="input-group">
                            <input type="text" name="q" value="<?php echo isset($_GET['q']) && $_GET['q'] != '' ? $_GET['q'] : '' ?>" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php foreach ($cats as $r): ?>
                                    <li>
                                        <a href="#"><?php echo $r['cat_title'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
<?php include "includes/footer.php"; ?>
