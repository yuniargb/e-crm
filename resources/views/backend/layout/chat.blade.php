<!-- Sidebar chat start -->
<div id="sidebar" class="p-fixed header-users showChat">
    <div class="had-container">
        <div class="card card_main header-users-main">
            <div class="card-content user-box">

                <div class="md-group-add-on p-20">
                    <span class="md-add-on">
                        <i class="icofont icofont-search-alt-2 chat-search"></i>
                    </span>
                    <div class="md-input-wrapper">
                        <input type="text" class="md-form-control" name="username" id="search-friends">
                        <label>Search</label>
                    </div>

                </div>
                <div class="media friendlist-main">

                    <h6>Customer List</h6>

                </div>
                <div class="main-friend-list" id="customerList">
                </div>
            </div>
        </div>
    </div>

</div>
<div class="showChat_inner chatInner" id="chatInner">
    <div class="media chat-inner-header" id="chatPesan">
        <a class="back_chatBox">
            <i class="icofont icofont-rounded-left"></i> <span id="nama_pelg"></span>
        </a>
    </div>
    <div id="kotakChat" class="kotakChat">
    </div>
    <div class="media chat-reply-box">
        <div class="md-input-wrapper">
            <input type="text" class="md-form-control" id="inputEmail" name="inputEmail">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="md-form-control" id="komplain_idd" name="komplain_id">
            <!-- <input type="hidden" class="md-form-control" id="" name="komplain_id"> -->
            <label>Reply</label>
            <span class="highlight"></span>
            <span class="bar"></span> <button type="button" class="chat-send waves-effect waves-light">
                <i class="icofont icofont-location-arrow f-20 "></i>
            </button>


        </div>

    </div>
</div>
<!-- Sidebar chat end-->