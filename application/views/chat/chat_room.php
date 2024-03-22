<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between bg-primary">
            <h4 class="my-auto font-weight-bold text-light">Kirim Ke <?=$penerima?></h4>
        </div>
        <div class="card-body m-0 p-0">
            <div id="wrapper" class="d-flex flex-column bg-light">
                <div id="menu" class="d-flex justify-content-between">
                    <p class="welcome">Welcome, <b><?php echo $nama_user; ?></b>!</p>
                    <p class="logout"><a class="btn btn-danger" id="exit" href="<?= base_url()."bimbingan"?> ">Exit Chat</a></p>
                </div>

                <!-- <div id="chatbox">
                    <?php {
                        foreach ($contents as $chat) {
                            echo $chat->pesan."<br>";
                        }
        
                    }
                ?> -->
            
                <!-- </div> -->
                <div id="chatbox" class="d-flex flex-column">
                <?php
                        foreach ($contents as $chat) {?>
                            
                            <div style="width: 480px" class="p-1 my-1 d-flex justify-content-between flex-wrap border rounded <?php if ($chat->pengirim == $this->session->userdata('id_user')) { echo 'bg-light align-self-end'; } else { echo 'bg-primary text-light'; } ?> "><span><?= $chat->pesan ?></span><span class="small ml-3 align-self-end"><?= $chat->tanggal ?></div>
                <?php }?>

                
            </div>
                <form name="message" action="">
                    <input name="usermsg" type="text" id="usermsg" />
                    <input type="hidden" name="nis" type="text" id="nismsg" value="<?=$nis?> " />
                    <input type="hidden"name="nip" type="text" id="nipmsg" value="<?=$nip?>"/>
                    <input name="submitmsg" type="submit" id="submitmsg" value="Send" class="btn btn-warning" />
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    var BASE_URL = "<?php echo base_url(); ?>";

    // jQuery Document for chat app
    $(document).ready(function() {
        $("#submitmsg").click(function() {
            var clientmsg = $("#usermsg").val();
            var nis = $("#nismsg").val();
            var nip = $("#nipmsg").val();
            var id_user = <?= $this->session->userdata('id_user') ?>;
            $.post(BASE_URL + 'chat/post', {
                text: clientmsg,
                nis: nis,
                nip: nip,
                pengirim:id_user,
            });
            $("#usermsg").val("");
            return false;
        });

        function loadLog() {

            var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
            var nis = $("#nismsg").val();
            var nip = $("#nipmsg").val();
            $.ajax({
                url: BASE_URL + "chat/get_chat/"+nis+"/"+nip,
                type:"json",
                cache: false,
                success: function(data) {
                    $("#chatbox").empty();
                  
                    data = JSON.parse(data);
                    var id_user = <?= $this->session->userdata('id_user') ?>;
                var contents = data.contents;
                
                for (var i = 0; i < contents.length; i++) {
                    var id_pengirim = contents[i]["pengirim"];
                    var pesan = contents[i]["pesan"];
                    //console.log(typeof(pesan));
                    var tanggal = contents[i]["tanggal"];

                    var bgstyle = "bg-primary text-light";

                    if (id_pengirim == id_user) {
                        bgstyle = "bg-light align-self-end";
                    }
                    var html = `<div style="width: 480px" class="p-1 my-1 d-flex justify-content-between flex-wrap border rounded 
		${bgstyle}">
		<span>${pesan}</span>
		<span class="small ml-3 align-self-end">${tanggal}</span>
	</div>`;

	//console.log(html);

	$("#chatbox").append(html); //Insert chat log into the #chatbox div

	
                }
                    //Auto-scroll           
                    var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                    if (newscrollHeight > oldscrollHeight) {
                        $("#chatbox").animate({
                            scrollTop: newscrollHeight
                        }, 'normal'); //Autoscroll to bottom of div
                    }
                }
            });
        }

        setInterval(loadLog, 2500);

            
            
    });
</script>