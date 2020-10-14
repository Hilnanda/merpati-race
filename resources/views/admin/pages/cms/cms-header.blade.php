@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Module Header
        {{-- <small>advanced tables</small> --}}
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Module Social Media</h3><br><br>
              {{-- <button class="btn btn-success"></button> --}}
              <a id="modal-515165" href="#modal-container-515165" role="button" class="btn btn-success" data-toggle="modal">+ Social Media</a>
			
              <div class="modal fade" id="modal-container-515165" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">
                        Add Social Media
                      </h5> 
                      <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form action="{{ route('cms-medsos-create') }}" method="POST">
                      {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                          
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                              <label for="name" class="control-label">Name Social Media</label>
                              <input type="text" name="name_medsos" class="form-control"  placeholder="Ex: Facebook"><br>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                              <label for="name" class="control-label">Url Social Media</label>
                              <input type="text" name="url_medsos" class="form-control"  placeholder="Ex: https://twitter.com/"><br>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                              <label for="name" class="control-label">Username Social Media</label>
                              <input type="text" name="username_medsos" class="form-control" placeholder="user_123"><br>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                              <label for="name" class="control-label">Icon Social Media</label>
                              <input type="text" name="icon_medsos" class="form-control" placeholder="Ex: fa-facebook"><br>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                       <input type="submit" class="btn btn-primary" value="Simpan">
                      
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </form>
                  </div>
                  
                </div>
                
              </div>

              <a id="modal-123" href="#modal-container-123" role="button" class="btn btn-primary" data-toggle="modal">Icon Social Media</a>
			
              <div class="modal fade" id="modal-container-123" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">
                        Icon Social Media
                      </h5> 
                      <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row fontawesome-icon-list">
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-500px"></i> fa-500px</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-adn"></i> fa-adn</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-amazon"></i> fa-amazon</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-android"></i> fa-android</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-angellist"></i> fa-angellist</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-apple"></i> fa-apple</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-behance"></i> fa-behance</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-behance-square"></i> fa-behance-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-bitbucket"></i> fa-bitbucket</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-bitbucket-square"></i> fa-bitbucket-square
                        </div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-bitcoin"></i> fa-bitcoin
                          <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-black-tie"></i> fa-black-tie</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-btc"></i> fa-btc</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-buysellads"></i> fa-buysellads</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-cc-amex"></i> fa-cc-amex</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-cc-diners-club"></i> fa-cc-diners-club</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-cc-discover"></i> fa-cc-discover</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-cc-jcb"></i> fa-cc-jcb</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-cc-mastercard"></i> fa-cc-mastercard</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-cc-paypal"></i> fa-cc-paypal</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-cc-stripe"></i> fa-cc-stripe</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-cc-visa"></i> fa-cc-visa</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-chrome"></i> fa-chrome</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-codepen"></i> fa-codepen</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-connectdevelop"></i> fa-connectdevelop</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-contao"></i> fa-contao</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-css3"></i> fa-css3</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-dashcube"></i> fa-dashcube</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-delicious"></i> fa-delicious</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-deviantart"></i> fa-deviantart</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-digg"></i> fa-digg</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-dribbble"></i> fa-dribbble</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-dropbox"></i> fa-dropbox</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-drupal"></i> fa-drupal</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-empire"></i> fa-empire</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-expeditedssl"></i> fa-expeditedssl</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-facebook"></i> fa-facebook</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-facebook-f"></i> fa-facebook-f
                          <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-facebook-official"></i> fa-facebook-official
                        </div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-facebook-square"></i> fa-facebook-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-firefox"></i> fa-firefox</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-flickr"></i> fa-flickr</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-fonticons"></i> fa-fonticons</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-forumbee"></i> fa-forumbee</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-foursquare"></i> fa-foursquare</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-ge"></i> fa-ge
                          <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-get-pocket"></i> fa-get-pocket</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-gg"></i> fa-gg</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-gg-circle"></i> fa-gg-circle</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-git"></i> fa-git</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-git-square"></i> fa-git-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-github"></i> fa-github</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-github-alt"></i> fa-github-alt</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-github-square"></i> fa-github-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-gittip"></i> fa-gittip
                          <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-google"></i> fa-google</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-google-plus"></i> fa-google-plus</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-google-plus-square"></i> fa-google-plus-square
                        </div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-google-wallet"></i> fa-google-wallet</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-gratipay"></i> fa-gratipay</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-hacker-news"></i> fa-hacker-news</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-houzz"></i> fa-houzz</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-html5"></i> fa-html5</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-instagram"></i> fa-instagram</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-internet-explorer"></i> fa-internet-explorer
                        </div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-ioxhost"></i> fa-ioxhost</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-joomla"></i> fa-joomla</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-jsfiddle"></i> fa-jsfiddle</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-lastfm"></i> fa-lastfm</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-lastfm-square"></i> fa-lastfm-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-leanpub"></i> fa-leanpub</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-linkedin"></i> fa-linkedin</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-linkedin-square"></i> fa-linkedin-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-linux"></i> fa-linux</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-maxcdn"></i> fa-maxcdn</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-meanpath"></i> fa-meanpath</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-medium"></i> fa-medium</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-odnoklassniki"></i> fa-odnoklassniki</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-odnoklassniki-square"></i>
                          fa-odnoklassniki-square
                        </div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-opencart"></i> fa-opencart</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-openid"></i> fa-openid</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-opera"></i> fa-opera</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-optin-monster"></i> fa-optin-monster</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-pagelines"></i> fa-pagelines</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-paypal"></i> fa-paypal</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-pied-piper"></i> fa-pied-piper</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-pied-piper-alt"></i> fa-pied-piper-alt</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-pinterest"></i> fa-pinterest</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-pinterest-p"></i> fa-pinterest-p</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-pinterest-square"></i> fa-pinterest-square
                        </div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-qq"></i> fa-qq</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-ra"></i> fa-ra
                          <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-rebel"></i> fa-rebel</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-reddit"></i> fa-reddit</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-reddit-square"></i> fa-reddit-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-renren"></i> fa-renren</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-safari"></i> fa-safari</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-sellsy"></i> fa-sellsy</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-share-alt"></i> fa-share-alt</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-share-alt-square"></i> fa-share-alt-square
                        </div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-shirtsinbulk"></i> fa-shirtsinbulk</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-simplybuilt"></i> fa-simplybuilt</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-skyatlas"></i> fa-skyatlas</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-skype"></i> fa-skype</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-slack"></i> fa-slack</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-slideshare"></i> fa-slideshare</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-soundcloud"></i> fa-soundcloud</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-spotify"></i> fa-spotify</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-stack-exchange"></i> fa-stack-exchange</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-stack-overflow"></i> fa-stack-overflow</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-steam"></i> fa-steam</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-steam-square"></i> fa-steam-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-stumbleupon"></i> fa-stumbleupon</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-stumbleupon-circle"></i> fa-stumbleupon-circle
                        </div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-tencent-weibo"></i> fa-tencent-weibo</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-trello"></i> fa-trello</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-tripadvisor"></i> fa-tripadvisor</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-tumblr"></i> fa-tumblr</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-tumblr-square"></i> fa-tumblr-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-twitch"></i> fa-twitch</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-twitter"></i> fa-twitter</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-twitter-square"></i> fa-twitter-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-viacoin"></i> fa-viacoin</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-vimeo"></i> fa-vimeo</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-vimeo-square"></i> fa-vimeo-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-vine"></i> fa-vine</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-vk"></i> fa-vk</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-wechat"></i> fa-wechat
                          <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-weibo"></i> fa-weibo</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-weixin"></i> fa-weixin</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-whatsapp"></i> fa-whatsapp</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-wikipedia-w"></i> fa-wikipedia-w</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-windows"></i> fa-windows</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-wordpress"></i> fa-wordpress</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-xing"></i> fa-xing</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-xing-square"></i> fa-xing-square</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-y-combinator"></i> fa-y-combinator</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-y-combinator-square"></i>
                          fa-y-combinator-square <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-yahoo"></i> fa-yahoo</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-yc"></i> fa-yc
                          <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-yc-square"></i> fa-yc-square
                          <span class="text-muted">(alias)</span></div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-yelp"></i> fa-yelp</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-youtube"></i> fa-youtube</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-youtube-play"></i> fa-youtube-play</div>
                        <div class="col-md-4 col-sm-4"><i class="fa fa-fw fa-youtube-square"></i> fa-youtube-square</div>
                      </div>
                    </div>
                    <div class="modal-footer">
                       
                      
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </div>
                  
                </div>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  @foreach ($data_medsos as $item)
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          <label for="name" class="control-label">{{ $item->name_medsos }}</label> <i class="fa {{ $item->icon_medsos }}"></i>
                          
                          <input type="text" name="instagram" class="form-control"  value="{{ $item->url_medsos }}" disabled>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          <label for="name" class="control-label">Username</label> 
                          <a style="margin-left: 5px;color: blue" id="medsos{{$item->id}}" href="#medsos-container{{$item->id}}" role="button" data-toggle="modal"><i class="fa fa-pencil"></i> Edit</a> |
                          <a style=";color: red" class="delete-club" href="medsos-delete/{{$item->id}}"><i class="fa fa-trash"></i> Delete</a>
                          <input type="text" name="username_medsos" class="form-control" value="{{ $item->username_medsos }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="medsos-container{{$item->id}}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">
                              Edit Social Media
                            </h5> 
                            <button type="button" class="close" data-dismiss="modal">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <form action="{{ route('medsos-edit') }}" method="POST">
                            {{csrf_field()}}
                          <div class="modal-body">
                              <div class="form-group">
                                
                                <div class="row">
                                  <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="name" class="control-label">Name Social Media</label>
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="text" name="name_medsos" class="form-control" value="{{ $item->name_medsos }}"><br>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="name" class="control-label">Url Social Media</label>
                                    <input type="text" name="url_medsos" class="form-control"  value="{{ $item->url_medsos }}"><br>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="name" class="control-label">Username Social Media</label>
                                    <input type="text" name="username_medsos" class="form-control" value="{{ $item->username_medsos }}"><br>
                                  </div>
                                  <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label for="name" class="control-label">Icon Social Media</label>
                                    <input type="text" name="icon_medsos" class="form-control" value="{{ $item->icon_medsos }}"><br>
                                  </div>
                                </div>
                              </div>
                            
                          </div>
                          <div class="modal-footer">
                             <input type="submit" class="btn btn-primary" value="Simpan">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                              Close
                            </button>
                          </div>
                        </form>
                        </div>
                        
                      </div>
                      
                    </div>
                  </div>
                  
                  @endforeach

                  
                </div>
              
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Module Website Name & Carousel</h3><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="name" class="control-label">Instagram</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="instagram" class="form-control"  value="https://www.instagram.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username IG">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="control-label">Twitter</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="twitter" class="form-control"  value="https://twitter.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username Twitter">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="name" class="control-label">Facebook</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="instagram" class="form-control"  value="https://www.instagram.com/" disabled>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" name="username_medsos" class="form-control" placeholder="Masukkan Username IG">
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection