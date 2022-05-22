

    <style>
        .mycourse {
            display: flex;
            border-bottom: #7cc242 2px solid;
            height: 150px;
            padding: 15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
        }

        .p1 {
            width: 25%;
        }

        .p1 img {
            height: 100%;
            width: 250px;
            padding: 10px;
        }

        .p2 {
            width: 35%;
            padding: 10px;
            opacity: 0.7;
        }

        .courseName {
            font-size: 19px;
            font-weight: 600;
        }

        .informationCorse {
            font-size: 14px;
        }

        .p3 {
            width: 20%;
            font-size: 30px;
            display: flex;
           
            justify-content: center;
            padding-top: 55px;
            opacity: 0.7;

        }

        .p3 a {
            color: black;
            padding: 0px 10px 0px 10px;
            text-align: center;

        }

        .p4 {
            justify-content: center;
            width: 20%;
            text-align: center;
            padding-top: 55px;

        }

        .p4 input {
            
            text-transform: uppercase;
            border: none;
            background: #7cc242;
            padding: 10px 30px;
            border-radius: 20px;
            color: #FFFFFF;
            font-size: .8em;
            font-weight: bold;
            letter-spacing: 1px;
            width: 50%;
            cursor: pointer;
        }

        .titleList{
            display: flex;
            color: #707070;
            
        }

        .course{
            width: 80%;
            display: flex;
            font-size: 36px;
            font-weight: bold;
            display: flex;
            margin: 40px;
            color: #707070;
            
        }
        .course a{
            color:  #707070;
        }
        .user {
            width: 20%;
           
            font-size: 20px;
            display: flex;
            padding: 10px;
            margin: 40px;
        }
        .user .role{
            border-left: 2px solid #707070;
            padding-left: 10px;
            margin-left: 10px;
        }

    </style>

        <?php
        $id=$_SESSION['id'];
        $name=$_SESSION['name'];
        $role=$_SESSION['role'];

        $sql_show ="SELECT *
        FROM account,student, payment, course,teacher
        WHERE student.studentID=payment.studentID
        AND payment.courseID=course.courseID 
        AND account.accountID=student.accountID
        AND teacher.teacherID=course.teacherID 
        AND account.accountID='$id' ORDER BY payment.paymentTime DESC";
        $query_show =mysqli_query($connect,$sql_show);

        ?>


        <div class="titleList">
            <div class="course">
                <i class="fa fa-folder-open" aria-hidden="true" style="padding: 0px  10px 0px 0px;"></i>
                <p><a href="#"> Các khóa học của tôi</a></p> 
            </div>
            <div class="user">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                <p class="userN"><?php echo $name;?></p>
                <p class="role">
                <?php
                    if($role == 1){
                        echo 'Học viên';
                    }
                    else if($role == 2){
                        echo 'Giáo viên';
                    }
                    else{
                        echo 'Admin';
                    }
                    ?>
                </p>

            </div>
            
        </div>
    <div class="listMyCourse">
    <?php
        while($row_pro=mysqli_fetch_array($query_show)){
            
    ?>
    <div class="mycourse">
     
        <div class="p1">
            <img class="imgMyCourse" src="<?=$row_pro['img']?>" alt="">
        </div>
        <div class="p2">
            <p class="courseName"><?=$row_pro['courseName']?></p>
            <p class="informationCourse">Giáo viên: <?=$row_pro['teacherName']?></p>
            <p class="informationCourse">Bắt đầu từ ngày: <?=$row_pro['paymentTime']?></p>
            <p class="informationCourse"><i class="fa fa-check-circle" aria-hidden="true"></i> đã đóng phí</p>
        </div>
        <div class="p3">
            <a href=""><i class="fa fa-cog" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
        <div class="p4">
            <input type="button" value="Vào học" name="vaohoc">
        </div>
    </div>
    <?php
        }
    ?>
    </div>
    