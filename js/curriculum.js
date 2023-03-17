
    $(document).ready(function() {
      "use strict"

      $('.modal').on('hidden.bs.modal', function (e) {
        $iframe = $(this).find("iframe");
        $iframe.attr("src", $iframe.attr("src"));
      });

      $(".nav li").click(function() {
        var idx = $(this).index();
        $(".snav").hide();
        $(".nav li").removeClass("on");
        $(this).addClass("on");
        var $snav = $(".snav.s" + (idx + 1));
        $snav.show();
        $snav.find("li").eq(0).trigger("click");
      });

      $(".snav li").click(function() {
        var tabNum = $(this).parent("ul").attr("class").replace("snav s", "");
        var idx = $(this).index() + 1;
        $(".snav li").removeClass("on");
        $(this).addClass("on");
        $(".cont").hide();
        $(".cont" + tabNum + "_" + idx).show();
        const level = $('.nav li').eq((tabNum - 1)).text();
        const skill = $(this).data('name');
        $("#video-list-data").attr('href', 'https://kamismax.kamisma.com/search?words=' + level + skill + 'コース');
        $("#video-list-data-name").text(level + skill);
      });

      tabInit(0);
    });

    function tabInit(index) {
      $(".nav li").eq(index).trigger("click");
    }
