<!-- Chat sidebar -->
<a class="chat-plus-btn text-decoration-none" href="#sidebar-chat" uk-toggle>
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path>
  </svg>
</a>

<div id="sidebar-chat" class="sidebar-chat px-3" uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">

    <div class="sidebar-chat-head mb-2">

      <div class="btn-actions">
        <a href="#" class="text-decoration-none" uk-tooltip="title: Search ;offset:7" uk-toggle="target: .sidebar-chat-search; animation: uk-animation-slide-top-small"> <i class="icon-feather-search"></i> </a>
        <a href="#" class="text-decoration-none" uk-tooltip="title: settings ;offset:7"> <i class="icon-feather-settings"></i> </a>
        <a href="#" class="text-decoration-none"> <i class="uil-ellipsis-v"></i> </a>
        <a href="#" class="uk-hidden@s text-decoration-none"> <button class="uk-offcanvas-close uk-close" type="button" uk-close> </button> </a>
      </div>

      <h2> Chats </h2>
    </div>

    <div class="sidebar-chat-search" hidden>
      <input type="text" class="uk-input" placeholder="Search in Messages">
      <span class="btn-close" uk-toggle="target: .sidebar-chat-search; animation: uk-animation-slide-top-small"> <i class="icon-feather-x"></i> </span>
    </div>

    <ul class="uk-child-width-expand sidebar-chat-tabs" uk-tab>
      <li class="uk-active"><a href="#" class="text-decoration-none"> Users </a></li>
      <li><a href="#" class="text-decoration-none"> Groups </a></li>
    </ul>

    <a href="#" class="text-decoration-none">
      <div class="contact-list">
        <div class="contact-list-media"> <img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="">
          <span class="online-dot"></span> </div> <!-- nah ini buat online dot nya, gatau gimana caranya biar tau dia online apa ga -->
        <h5> Mahsa Savira </h5>
      </div>
    </a>

    <a href="#" class="text-decoration-none">
      <div class="contact-list">
        <div class="contact-list-media"> <img src="<?= base_url('assets/images/avatars/avatar-5.jpg'); ?>" alt=""> <!-- ini poto user atau grup ya-->
          <span class="offline-dot"></span> </div>
        <h5> Monica Tifani </h5>
      </div>
    </a>

  </div>
</div>
</div>