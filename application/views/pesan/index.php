<!-- contents -->
<div class="main_content">

  <div class="main_content_inner" style="max-width: 1300px;">

    <div class="uk-grid-collapse" uk-grid>
      <div class="uk-width-3-4@m">

        <div class="chats-container margin-top-0">

          <div class="chats-container-inner">

            <!-- chats -->
            <div class="chats-inbox">
              <div class="chats-headline">
                <div class="input-with-icon">
                  <input class="uk-input" type="text" placeholder="Search ...">
                </div>
              </div>

              <ul>
                <li class="active-message">
                  <a href="#" class="text-decoration-none">
                    <div class="message-avatar"><i class="status-icon status-online"></i><img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="" /></div>

                    <div class="message-by">
                      <div class="message-by-headline">
                        <h5> Mahsa Savira </h5>
                        <span> 2 hours ago </span>
                      </div>
                      <p> Jangan Lupa PR ... </p>
                      <span class="message-readed uil-check"> </span>
                    </div>
                  </a>
                </li>

                <li>
                  <a href="#" class="text-decoration-none">
                    <div class="message-avatar"><i class="status-icon status-offline"></i><img src="<?= base_url('assets/images/avatars/avatar-5.jpg'); ?>" alt="" /></div>

                    <div class="message-by">
                      <div class="message-by-headline">
                        <h5> Monica Tifani </h5>
                        <span> 3 hours ago </span>
                      </div>
                      <p> Yuhuuuuu Siappp ... </p>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            <!-- chats / End -->

            <!-- Message Content -->
            <div class="message-content">

              <div class="chats-headline">

                <div class="uk-flex">
                  <img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" width="40px" class="uk-border-circle" alt="">
                  <h4 class="ml-2"> Mahsa Savira <span> Online </span> </h4>
                </div>

                <div class="message-action">
                  <a href="#" uk-tooltip="" class="text-decoration-none">
                    <i class="uil-ellipsis-h"></i>
                  </a>
                  <div uk-dropdown="pos: left ; mode: click ;animation: uk-animation-slide-bottom-small">
                    <ul class="uk-nav uk-dropdown-nav">
                      <li><a href="#" class="text-decoration-none"> Refresh </a></li>
                    </ul>
                  </div>
                </div>

              </div>

              <!-- Message Content Inner -->
              <div class="message-content-inner">

                <!-- Time Sign -->
                <div class="message-time-sign">
                  <span> 12 July 2020 </span> <!-- ambil tanggal -->
                </div>

                <div class="message-bubble me">
                  <div class="message-bubble-inner">
                    <div class="message-avatar"><img src="<?= base_url('assets/images/avatars/avatar-1.jfif'); ?>" alt="" /> <!-- foto profil yg login -->
                    </div>
                    <div class="message-text">
                      <p> jangan lupa </p>
                    </div>
                  </div>
                  <div class="uk-clearfix"></div>
                </div>

                <div class="message-bubble">
                  <div class="message-bubble-inner">
                    <div class="message-avatar"><img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="" /> <!-- foto profil temen chat -->
                    </div>
                    <div class="message-text">
                      <p> ok </p>
                    </div>
                  </div>
                  <div class="uk-clearfix"></div>
                </div>

                <!-- Time Sign -->
                <div class="message-time-sign">
                  <span> Yesterday </span> <!-- batas waktu -->
                </div>

                <div class="message-bubble me">
                  <div class="message-bubble-inner">
                    <div class="message-avatar"><img src="<?= base_url('assets/images/avatars/avatar-1.jfif'); ?>" alt="" />
                    </div>
                    <div class="message-text">
                      <p> Hei ayo </p>
                    </div>
                  </div>
                  <div class="uk-clearfix"></div>
                </div>

                <div class="message-bubble">
                  <div class="message-bubble-inner">
                    <div class="message-avatar"><img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="" />
                    </div>
                    <div class="message-text">
                      <p> siap bro </p>
                    </div>
                  </div>
                  <div class="uk-clearfix"></div>
                </div>

                <div class="message-bubble me">
                  <div class="message-bubble-inner">
                    <div class="message-avatar"><img src="<?= base_url('assets/images/avatars/avatar-1.jfif'); ?>" alt="" />
                    </div>
                    <div class="message-text">
                      <p> cepet ...</p>
                    </div>
                  </div>
                  <div class="uk-clearfix"></div>
                </div>

                <div class="message-bubble">
                  <div class="message-bubble-inner">
                    <div class="message-avatar"><img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="" />
                    </div>
                    <div class="message-text w-auto uk-flex"> Typing..
                      <!-- Typing Indicator -->
                      <div class="typing-indicator">
                        <!-- ini baian kalo detect typing -->
                        <span></span>
                        <span></span>
                        <span></span>
                      </div>
                    </div>
                  </div>
                  <div class="uk-clearfix"></div>
                </div>
              </div>
              <!-- Message Content Inner / End -->

              <!-- Reply Area -->
              <div class="message-reply">

                <form class="uk-flex-middle uk-width-1-1" uk-grid>
                  <div class="uk-flex uk-flex-middle mr-3 uk-width-auto">
                    <a href="#" class="button primary mr-2 text-decoration-none" uk-tooltip="filter">
                      <i class="uil-smile-wink"></i>
                    </a>
                    <a href="#" class="button primary text-decoration-none" uk-tooltip="filter">
                      <i class="uil-link-alt"></i>
                    </a>
                  </div>

                  <textarea class="uk-textarea uk-width-expand" rows="5" placeholder="Your Message" data-autoresize></textarea>

                  <button type="submit" class="button primary uk-width-auto">
                    <i class="uil-plane"></i>
                  </button>
                </form>
              </div>
            </div>
            <!-- Message Content -->
          </div>
        </div>
        <!-- chats Container / End -->
      </div>
    </div>

  </div>