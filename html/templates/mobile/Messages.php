<?php 
include 'html/templates/interior/idletimeout.php'; 
include 'lib/php/data/messages_load.php';
?>
<div class="navbar navbar-fixed-top navbar-headnav">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar btn-push-down" data-toggle="collapse" data-target=".nav-collapse">
                Menu
                <i class="icon-chevron-down icon-white"></i>
            </a>
            <a class="btn btn-navbar btn-push-down" href="index.php?i=QuickAdd.php">
                Quick Add
                <i class="icon-plus icon-white"></i>
            </a>
            <a class="brand" href="#"><img src="html/images/logo_sm.png"></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="index.php?i=Home.php">Home</a></li>
                    <li><a href="index.php?i=Cases.php">Cases</a></li>
                    <li class="active"><a href="index.php?i=Messages.php">Messages</a>
                    <li><a href="index.php?i=QuickAdd.php">Quick Add</a>
                    <li><a href="index.php?i=Logout.php">Logout</a>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
    <!--
    <pre>
        <?php print_r($msgs); ?>
    </pre>
    -->
<div class="container">
    <div class="row" id="notifications"></div>
    <div class="row">
        <a class="btn btn-success pull-right"><i class="icon-envelope icon-white"></i> New Message</a>
    </div>
    <div class="row">
        <h1>Messages</h1>
    </div>
    <div class="row">
        <form class="form-inline">
        <div class="input-append">
            <input type="text" class="case-search search-query" placeholder="Search">
            <button class="btn search-submit" type="button">Go</button>
        </div>
        <select name="msg-status" class="small-select pull-right">
            <option value="inbox">Inbox</option>
            <option value="sent">Sent</option>
            <option value="archive">Archive</option>
            <option value="starred">Starred</option>
        </select>
        </form>
    </div>
    <br />
    <div class="row msg_display">
        <ul class="unstyled">
            <?php foreach ($msgs as $m) {extract($m);?>
                <li class="li-expand-msg">
                    <div><img class="img-rounded" src="<?php echo return_thumbnail($dbh,$from);?>">
                    <span><?php echo username_to_fullname($dbh,$from); ?> - 
                          <?php echo extract_date_time($time_sent); ?> 
                    </span> 
                    </div>
                    <h5><?php echo htmlentities($subject); ?></h5> 
                    <ul class="unstyled">
                        <li class="truncate">To: <?php echo format_name_list($dbh,$to); ?></li> 
                        <?php if (!empty($ccs)){ ?>
                        <li>Cc: <?php echo format_name_list($dbh,$ccs); ?></li>
                        <?php } ?>
                        <br />
                        <li><?php echo stripslashes($body); ?> </li>
                    </ul>
                </li>
                <hr />
            <?php } ?>
        </ul>
    </div>
</div>

