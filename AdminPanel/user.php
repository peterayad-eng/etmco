<main>
    <?php
        $select_sqlu = $connec->query('SELECT type FROM users WHERE user = ?', $_SESSION['user'])->fetchArray();
        if($select_sqlu['type']=='admin'){
            $user=$_SESSION['user'];
            $select_sql = $connec->query('SELECT id, user, type FROM users WHERE id>0')->fetchAll();
    ?>
    <section id="users">
        <?php
            if(isset($_GET['adderror']) && $_GET['adderror'] == 0){
                echo "<div style='color:green'>The User Added successfully </div>";
            }
            
            if(isset($_GET['editPerror']) && $_GET['editPerror'] == 0){
                echo "<div style='color:green'>The Password Reset successfully </div>";
            }
        
            if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 0){
				echo "<div style='color:green'>The User deleted successfully </div>";
            }
            else if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 1){
                echo "<div style='color:red'>The User could not be deleted </div>";
            }
					
        ?>
        <div class="center white"><h3>Users</h3></div>
        <div class="row col-12 nopadd nomargin bottommargin">
            <div class="col-1"></div>
            <div class="col-12 col-md-10 nopadd">
                <table class="table table-dark table-striped table-bordered center">
                  <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Level</th>
                        <th scope="col">Password</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($select_sql as $user){
                            $id = $user['id'];
                    ?>
                        <tr>
                            <th class='verticalalign' scope="row"><?=$id?></th>
                            <td class='verticalalign'><?=$user['user']?></td>
                            <td class='verticalalign'><?=$user['type']?></td>
                            <td><a href="confirmPass?id=<?=$id?>" class="btn btn-secondary btn-lg resetButton" role="button" aria-pressed="true">Reset</a></td>
                            <?php
                                }
                            ?>
                        </tr> 
                  </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </section>
    <?php
        }
    ?>
</main>