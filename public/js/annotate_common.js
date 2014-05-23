$(document).ready(function(){

  // 囲んだデータ
  crop_data = [];

  // ------------------
  // controller
  // ------------------
  function init() {
    var img_data = get_img();

    // レイアウト初期化
    $('.crop-holder img').remove();
    $('.crop-holder div').remove();

    // 画像配置
    $('.crop-holder').append('<img id="target-img" src="' + img_data['img'] + '" />');

    // データ初期化
    _.map(img_data['crop'], function(map) {
      crop_data.push(map);
    });

    // 囲む座標初期化
    cropper_refresh();
  }


  // crop_dataが変更されたとき実行
  function cropper_refresh() {
    console.log('cropper_refresh');
    update_matrix_table();
    update_crop_sqrt();
  }


  // 囲んだとき
  function croped(img, selection) {
    console.log('selection:');
    console.log(selection);

    // 小さいと除外
    if(selection['width'] < 40 || selection['height'] < 40) return ;

    // 蓄積していく
    crop_data.push({
      'left'   : selection['x1'],
      'top'    : selection['y1'],
      'width'  : selection['width'],
      'height' : selection['height']
    });

    // 再描画
    cropper_refresh();
  }


  // TODO: 
  function save_img_info() {
  }


  // ------------------
  // getter / setter
  // ------------------
  // TODO: webからJSONで受け取る
  function get_img() {
    img_data = {
      'img' : 'crop/cat01.jpg',
      // 'img' : 'http://thecatapi.com/api/images/get?format=src&type=gif',
      // 'img' : 'http://thecatapi.com/api/images/get?format=src&type=jpg',
      // 'crop': {
      //   0: {
      //     'left':40,
      //     'top':20,
      //     'width':140,
      //     'height':130,
      //   },
      //   1: {
      //     'left':150,
      //     'top':120,
      //     'width':80,
      //     'height':80,
      //   },
      // }
    };
    return img_data;
  }


  // ------------------
  // worker
  // ------------------
  // データテーブルに反映
  function update_matrix_table() {
    var target_tbody = $('#matrix_table tbody');
    target_tbody.empty();

    var td = [];

    _.map(crop_data, function(map, key) {
      console.log(map);
      td.push(
        _.sprintf(
          '<tr>'
          + '<td>%d</td>'
          + '<td>%d</td>'
          + '<td>%d</td>'
          + '<td>%d</td>'
          + '<td><div class="medium danger btn medium remove-sqrt-btn" val="%s"><a href="#"><i class="icon-cancel-circled"></i></a></div></td>'
          + '<tr>',
          map['left'],
          map['top'],
          map['width'],
          map['height'],
          key
        )
      );
    });

    target_tbody[0].innerHTML = td.join('');

    // 動的要素追加後、イベント埋め込み
    $('.remove-sqrt-btn').on("click", function(){
      console.log($(this).attr('val'));
      var key = $(this).attr('val');
      remove_crop(key);
    });

  }

  function remove_crop(key) {
      delete crop_data[key];
      cropper_refresh();
  }
  

  // 画像の囲み反映
  function update_crop_sqrt() {
    $('.crop-holder div').remove();
    _.map(crop_data, function(map, key) {
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


  // init underscore.string
  _.mixin(_.str.exports());

  // 画像の取得とデータテーブルの吐き出し
  init();

  // imgareaselect初期化
  // TODO: init_cropperに含めるか要調整
  $('img#target-img').imgAreaSelect({
    handles: true,
    onSelectEnd: croped
  });
});

