$(document).ready(function(){

  // 囲んだデータ
  scraps = [];
  img_data = null;

  // ------------------
  // controller
  // ------------------
  function init() {
    scraps = [];
    img_data = get_img();

    if (img_data == false) return false;

    // レイアウト初期化
    $('.crop-holder img').remove();
    $('.crop-holder div').remove();

    // 画像配置
    $('.crop-holder').append('<img id="target-img" src="' + img_data.img + '" />');

    // データ初期化
    _.map(img_data.crop, function(map) {
      scraps.push(map);
    });

    // 囲む座標初期化
    cropper_refresh();

    // imgareaselect初期化
    // TODO: init_cropperに含めるか要調整
    $('img#target-img').imgAreaSelect({
      handles: true,
      onSelectEnd: croped,
      autoHide:true
    });

    return true;
  }


  // scrapsが変更されたとき実行
  function cropper_refresh() {
    console.log('cropper_refresh');
    update_scrap_table();
    update_crop_sqrt();
  }


  // 囲んだとき
  function croped(img, selection) {
    // 小さいと除外
    if(selection.width < 40 || selection.height < 40) return ;

    // 蓄積していく
    scraps.push({
      'left'   : selection.x1,
      'top'    : selection.y1,
      'width'  : selection.width,
      'height' : selection.height
    });

    // 再描画
    cropper_refresh();
  }


  // ------------------
  // getter / setter
  // ------------------
  // TODO: webからJSONで受け取る
  function get_img() {
    var img_info = null;

    var ret = $.ajax({
      type:"get",
      url:'/annotate/img',
      async:false,
      datatype:'json',
      success: function(res) {
        img_info = JSON.parse(res);
        if (img_info.length == 0) img_info = false;
      }
    }).done(function(html) {
    });

    return img_info;
  }


  // ------------------
  // worker
  // ------------------
  // データテーブルに反映
  function update_scrap_table() {
    var target_tbody = $('#scrap_table tbody');
    target_tbody.empty();

    var td = [];

    _.map(scraps, function(map, key) {
      td.push(
        _.sprintf(
          '<tr>'
          + '<td>%d</td>'
          + '<td>%d</td>'
          + '<td>%d</td>'
          + '<td>%d</td>'
          + '<td><div class="medium danger btn medium remove-sqrt-btn" val="%s"><a href="#"><i class="icon-cancel-circled"></i></a></div></td>'
          + '<tr>',
          map.left,
          map.top,
          map.width,
          map.height,
          key
        )
      );
    });

    target_tbody[0].innerHTML = td.join('');

    // 動的要素追加後、イベント埋め込み
    $('.remove-sqrt-btn').on("click", function(){
      var key = $(this).attr('val');
      remove_scrap(key);
    });

  }


  function remove_scrap(key) {
      delete scraps[key];
      cropper_refresh();
  }


  // save
  $('#save-scraps').on("click", function(){
    var params = {
      'img': img_data.img,
      'scraps': scraps
    };

    connect_action(params, '/annotate/save');
    init();
  });

  // remove
  $('#remove-scraps').on("click", function(){
    var params = {
      'img': img_data.img
    };

    connect_action(params, '/annotate/remove');
    init();
  });


  function connect_action(params, url) {

    var ret = $.ajax({
      type:"post",
      url:url,
      data:params,
      async:false,
      datatype:'json',
      success: function(res) {
        // console.log(res);
      }
    }).done(function(html) {
      if (init() != true) {
        finished_task();
      }

      return true;
    });
  }


  // 画像の囲み反映
  function update_crop_sqrt() {
    $('.crop-holder div').remove();
    _.map(scraps, function(map, key) {
      $('.crop-holder').append(
        _.sprintf(
          '<div class="crop-wrapper" style="left:%(left)spx;top:%(top)spx; width:%(width)spx; height:%(height)spx">'
          + '<div class="crop-vline"></div>'
          + '<div class="crop-vline right"></div>'
          + '<div class="crop-hline"></div>'
          + '<div class="crop-hline bottom"></div>'
          + '</div>',
          map
        )
      );
    });
  }


  function finished_task() {
    $('#alert').fadeIn(1000).delay(3000).fadeOut(2000);
    $('.disp-data-area').fadeOut(2000);
  }

  // init underscore.string
  _.mixin(_.str.exports());

  // 画像の取得とデータテーブルの吐き出し
  if (init() != true) {
    finished_task();
  }
});

