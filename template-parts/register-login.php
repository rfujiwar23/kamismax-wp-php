<div class="register-login bg">
    <ul>
        <li class="login"><a href="https://kamismax.kamisma.com/login">ログイン</a></li>
        <li class="register"><a href="https://kamismax.kamisma.com/login">会員登録</a></li>
    </ul>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).scroll(function () {
      var y = $(this).scrollTop();
      if (y > 800) {
        $('.register-login').fadeIn();
      } else {
        $('.register-login').fadeOut();
      }
    });
</script>