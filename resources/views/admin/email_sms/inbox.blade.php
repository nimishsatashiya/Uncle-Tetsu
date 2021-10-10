@extends('admin.layouts.app')

@section('styles')
<link href="{{ asset('themes/admin/assets/apps/css/inbox.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/global/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
  
@section('content')
<div class="page-head">
    <div class="page-title">
        <h1>Inbox
            <small>user inbox</small>
        </h1>
    </div>
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Apps</span>
    </li>
</ul>
<div class="inbox">
    <div class="row">
        <div class="col-md-2">
            <div class="inbox-sidebar">
                <a href="javascript:;" data-title="Compose" class="btn red compose-btn btn-block">
                    <i class="fa fa-edit"></i> Compose </a>
                <ul class="inbox-nav" id="list">
                    <li class="active" data-type="inbox" id="list0">
                        <a href="javascript:;" data-type="Inbox" data-title="Inbox"> Inbox
                            <span class="badge badge-success">3</span>
                        </a>
                    </li>
                    <li data-type="Important" id="list1">
                        <a href="javascript:;" data-type="important" data-title="Inbox"> Important </a>
                    </li>
                    <li data-type="Sent" id="list2">
                        <a href="javascript:;" data-type="sent" data-title="Sent"> Sent </a>
                    </li>
                    <li data-type="Draft" id="list3">
                        <a href="javascript:;" data-type="draft" data-title="Draft"> Draft
                            <span class="badge badge-danger">8</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li data-type="Trash" id="list4">
                        <a href="javascript:;" class="sbold uppercase" data-title="Trash"> Trash
                            <span class="badge badge-info">23</span>
                        </a>
                    </li>
                    <li data-type="Inbox" id="list5">
                        <a href="javascript:;" data-type="inbox" data-title="Promotions"> Promotions
                            <span class="badge badge-warning">2</span>
                        </a>
                    </li>
                    <li data-type="Inbox" id="list6">
                        <a href="javascript:;" data-type="inbox" data-title="News"> News </a>
                    </li>
                </ul>
                <ul class="inbox-contacts">
                    <li class="divider margin-bottom-30"></li>
                    <li>
                        <a href="javascript:;">
                            <img class="contact-pic" src="{{ asset('themes/admin/assets/pages/media/users/avatar4.jpg')}}">
                            <span class="contact-name">Adam Stone</span>
                            <span class="contact-status bg-green"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img class="contact-pic" src="{{ asset('themes/admin/assets/pages/media/users/avatar2.jpg')}}">
                            <span class="contact-name">Lisa Wong</span>
                            <span class="contact-status bg-red"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img class="contact-pic" src="{{ asset('themes/admin/assets/pages/media/users/avatar5.jpg')}}">
                            <span class="contact-name">Nick Strong</span>
                            <span class="contact-status bg-green"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img class="contact-pic" src="{{ asset('themes/admin/assets/pages/media/users/avatar6.jpg')}}">
                            <span class="contact-name">Anna Bold</span>
                            <span class="contact-status bg-yellow"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img class="contact-pic" src="{{ asset('themes/admin/assets/pages/media/users/avatar7.jpg')}}">
                            <span class="contact-name">Richard Nilson</span>
                            <span class="contact-status bg-green"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="inbox-body">
                <div class="inbox-header">
                    <h1 class="pull-left" id="msgMethodVal">Inbox</h1>
                    <form class="form-inline pull-right" action="#">
                        <div class="input-group input-medium">
                            <input type="text" class="form-control" placeholder="Password">
                            <span class="input-group-btn">
                                <button type="submit" class="btn green">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="inbox-content"> 
                    <table class="table table-striped table-advance table-hover" id="table1">
                        <thead>
                            <tr>
                                <th colspan="3">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-group-checkbox">
                                        <span></span>
                                    </label>
                                    <div class="btn-group input-actions">
                                        <a class="btn btn-sm blue btn-outline dropdown-toggle sbold" href="javascript:;" data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-pencil"></i> Mark as Read </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-ban"></i> Spam </a>
                                            </li>
                                            <li class="divider"> </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-trash-o"></i> Delete </a>
                                            </li>
                                        </ul>
                                    </div>
                                </th>
                                <th class="pagination-control" colspan="3">
                                    <span class="pagination-info"> 1-30 of 789 </span>
                                    <a class="btn btn-sm blue btn-outline">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="btn btn-sm blue btn-outline">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="unread" data-messageid="1">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> Petronas IT </td>
                                <td class="view-message "> New server for datacenter needed </td>
                                <td class="view-message inbox-small-cells">
                                    <i class="fa fa-paperclip"></i>
                                </td>
                                <td class="view-message text-right"> 16:30 PM </td>
                            </tr>
                            <tr class="unread" data-messageid="2">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> Daniel Wong </td>
                                <td class="view-message"> Please help us on customization of new secure server </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="3">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="4">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> Facebook </td>
                                <td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 14 </td>
                            </tr>
                            <tr data-messageid="5">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star inbox-started"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="6">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star inbox-started"></i>
                                </td>
                                <td class="view-message hidden-xs"> Facebook </td>
                                <td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                <td class="view-message inbox-small-cells">
                                    <i class="fa fa-paperclip"></i>
                                </td>
                                <td class="view-message text-right"> March 14 </td>
                            </tr>
                            <tr data-messageid="7">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star inbox-started"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells">
                                    <i class="fa fa-paperclip"></i>
                                </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="8">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> Facebook </td>
                                <td class="view-message view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 14 </td>
                            </tr>
                            <tr data-messageid="9">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="10">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> Facebook </td>
                                <td class="view-message view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 14 </td>
                            </tr>
                            <tr data-messageid="11">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star inbox-started"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="12">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star inbox-started"></i>
                                </td>
                                <td class="hidden-xs"> Facebook </td>
                                <td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                <td class="view-message inbox-small-cells">
                                    <i class="fa fa-paperclip"></i>
                                </td>
                                <td class="view-message text-right"> March 14 </td>
                            </tr>
                            <tr data-messageid="13">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells">
                                    <i class="fa fa-paperclip"></i>
                                </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="14">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="hidden-xs"> Facebook </td>
                                <td class="view-message view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 14 </td>
                            </tr>
                            <tr data-messageid="15">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="16">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> Facebook </td>
                                <td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 14 </td>
                            </tr>
                            <tr data-messageid="17">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star inbox-started"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells"> </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                            <tr data-messageid="18">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> Facebook </td>
                                <td class="view-message view-message"> Dolor sit amet, consectetuer adipiscing </td>
                                <td class="view-message inbox-small-cells">
                                    <i class="fa fa-paperclip"></i>
                                </td>
                                <td class="view-message text-right"> March 14 </td>
                            </tr>
                            <tr data-messageid="19">
                                <td class="inbox-small-cells">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="mail-checkbox" value="1">
                                        <span></span>
                                    </label>
                                </td>
                                <td class="inbox-small-cells">
                                    <i class="fa fa-star"></i>
                                </td>
                                <td class="view-message hidden-xs"> John Doe </td>
                                <td class="view-message"> Lorem ipsum dolor sit amet </td>
                                <td class="view-message inbox-small-cells">
                                    <i class="fa fa-paperclip"></i>
                                </td>
                                <td class="view-message text-right"> March 15 </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="viewMessage"><div class="inbox-header inbox-view-header"><h1 class="pull-left">New server for datacenter needed<a href="javascript:;"> Inbox </a></h1><div class="pull-right"><a href="javascript:;" class="btn btn-icon-only dark btn-outline"><i class="fa fa-print"></i></a></div></div><div class="inbox-view-info"><div class="row"><div class="col-md-7"><img src="http://www.iprore.com/memberportal/assets/pages/media/users/avatar1.jpg" class="inbox-author"><span class="sbold">Petronas IT </span><span>&lt;support@go.com&gt; </span> to<span class="sbold"> me </span> on 08:20PM 29 JAN 2013 </div><div class="col-md-5 inbox-info-btn"><div class="btn-group"><button data-messageid="23" class="btn green reply-btn"><i class="fa fa-reply"></i> Reply<i class="fa fa-angle-down"></i></button><ul class="dropdown-menu pull-right"><li><a href="javascript:;" data-messageid="23" class="reply-btn"><i class="fa fa-reply"></i> Reply </a></li><li><a href="javascript:;"><i class="fa fa-arrow-right reply-btn"></i> Forward </a></li><li><a href="javascript:;"><i class="fa fa-print"></i> Print </a></li><li class="divider"> </li><li><a href="javascript:;"><i class="fa fa-ban"></i> Spam </a></li><li><a href="javascript:;"><i class="fa fa-trash-o"></i> Delete </a></li><li></li></ul></div></div></div></div><div class="inbox-view"><p><strong>Lorem ipsum</strong>dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nislut aliquip ex ea commodo consequat. </p><p> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et<a href="javascript:;"> iusto odio dignissim </a> qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typinon habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. </p><p> Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. </p><p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodemmodo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. </p></div><hr><div class="inbox-attached"><div class="margin-bottom-15"><span>attachments — </span><a href="javascript:;">Download all attachments </a><a href="javascript:;">View all images </a></div><div class="margin-bottom-25"><img src="http://www.iprore.com/memberportal/assets/pages/media/gallery/image4.jpg"><div><strong>image4.jpg</strong><span>173K </span><a href="javascript:;">View </a><a href="javascript:;">Download </a></div><div class="margin-bottom-25"><img src="http://www.iprore.com/memberportal/assets/pages/media/gallery/image3.jpg"><div><strong>IMAG0705.jpg</strong><span>14K </span><a href="javascript:;">View </a><a href="javascript:;">Download </a></div></div><div class="margin-bottom-25"><img src="http://www.iprore.com/memberportal/assets/pages/media/gallery/image5.jpg"><div><strong>test.jpg</strong><span>132K </span><a href="javascript:;">View </a><a href="javascript:;">Download </a></div></div></div></div></div>

                    <form class="inbox-compose form-horizontal" id="fileupload" action="#" method="POST" enctype="multipart/form-data">
                        <div class="inbox-compose-btn">
                            <button class="btn green">
                                <i class="fa fa-check"></i>Send</button>
                            <button class="btn default">Discard</button>
                            <button class="btn default">Draft</button>
                        </div>
                        <div class="inbox-form-group mail-to">
                            <label class="control-label">To:</label>
                            <div class="controls controls-to">
                                <input type="text" class="form-control" name="to" value="fiona.stone@arthouse.com, lisa.wong@pixel.com, jhon.doe@gmail.com">
                                <span class="inbox-cc-bcc">
                                    <span class="inbox-cc " style="display:none"> Cc </span>
                                    <span class="inbox-bcc"> Bcc </span>
                                </span>
                            </div>
                        </div>
                        <div class="inbox-form-group input-cc">
                            <a href="javascript:;" class="close"> </a>
                            <label class="control-label">Cc:</label>
                            <div class="controls controls-cc">
                                <input type="text" name="cc" class="form-control" value="jhon.doe@gmail.com, kevin.larsen@gmail.com"> </div>
                        </div>
                        <div class="inbox-form-group input-bcc display-hide">
                            <a href="javascript:;" class="close"> </a>
                            <label class="control-label">Bcc:</label>
                            <div class="controls controls-bcc">
                                <input type="text" name="bcc" class="form-control"> </div>
                        </div>
                        <div class="inbox-form-group">
                            <label class="control-label">Subject:</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="subject" value="Urgent - Financial Report for May, 2013"> </div>
                        </div>
                        <div class="inbox-form-group">
                            <div class="controls-row">
                                <ul class="wysihtml5-toolbar" style=""><li class="dropdown"><a class="btn default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-font"></i>&nbsp;<span class="current-font">Normal text</span>&nbsp;<b class="caret"></b></a><ul class="dropdown-menu"><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="div" tabindex="-1" href="javascript:;" unselectable="on">Normal text</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1" href="javascript:;" unselectable="on">Heading 1</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1" href="javascript:;" unselectable="on">Heading 2</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1" href="javascript:;" unselectable="on">Heading 3</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4" href="javascript:;" unselectable="on">Heading 4</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5" href="javascript:;" unselectable="on">Heading 5</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6" href="javascript:;" unselectable="on">Heading 6</a></li></ul></li><li><div class="btn-group"><a class="btn default" data-wysihtml5-command="bold" title="CTRL+B" tabindex="-1" href="javascript:;" unselectable="on">Bold</a><a class="btn default" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1" href="javascript:;" unselectable="on">Italic</a><a class="btn default" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1" href="javascript:;" unselectable="on">Underline</a></div></li><li><div class="btn-group"><a class="btn default" data-wysihtml5-command="insertUnorderedList" title="Unordered list" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-list"></i></a><a class="btn default" data-wysihtml5-command="insertOrderedList" title="Ordered list" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-th-list"></i></a><a class="btn default" data-wysihtml5-command="Outdent" title="Outdent" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-outdent"></i></a><a class="btn default" data-wysihtml5-command="Indent" title="Indent" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-indent"></i></a></div></li><li><div class="btn-group"><a class="btn default" data-wysihtml5-action="change_view" title="Edit HTML" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-pencil"></i></a></div></li><li><div class="bootstrap-wysihtml5-insert-link-modal modal fade"><div class="modal-dialog"> <div class="modal-content"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>Insert link</h3></div><div class="modal-body"><input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control input-xlarge"><label style="margin-top:5px;"> <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="">Open link in new window</label></div><div class="modal-footer"><a href="#" class="btn default" data-dismiss="modal">Cancel</a><a href="#" class="btn btn-primary" data-dismiss="modal">Insert link</a></div></div></div></div><a class="btn default" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-share"></i></a></li><li><div class="bootstrap-wysihtml5-insert-image-modal modal fade"><div class="modal-dialog"> <div class="modal-content"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>Insert image</h3></div><div class="modal-body"><input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control input-xlarge"></div><div class="modal-footer"><a href="#" class="btn default" data-dismiss="modal">Cancel</a><a href="#" class="btn btn-primary" data-dismiss="modal">Insert image</a></div></div></div></div><a class="btn default" data-wysihtml5-command="insertImage" title="Insert image" tabindex="-1" href="javascript:;" unselectable="on"><i class="fa fa-picture-o"></i></a></li></ul>
                                <textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" rows="12"></textarea>
                                <!--blockquote content for reply message, the inner html of reply_email_content_body element will be appended into wysiwyg body. Please refer Inbox.js loadReply() function. -->
                                <div id="reply_email_content_body" class="hide">
                                    <input type="text">
                                    <br>
                                    <br>
                                    <blockquote> Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                        <br>
                                        <br> Consectetuer adipiscing elit, sed diam nonummy nibh euismod exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                        <br>
                                        <br> All the best,
                                        <br> Lisa Nilson, CEO, Pixel Inc. </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="inbox-compose-attachment">
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <span class="btn green btn-outline  fileinput-button">
                                <i class="fa fa-plus"></i>
                                <span> Add files... </span>
                                <input type="file" name="files[]" multiple> </span>
                            <!-- The table listing the files available for upload/download -->
                            <table role="presentation" class="table table-striped margin-top-10">
                                <tbody class="files"> </tbody>
                            </table>
                        </div>
                        <script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-upload fade">
                                <td class="name" width="30%">
                                    <span>{%=file.name%}</span>
                                </td>
                                <td class="size" width="40%">
                                    <span>{%=o.formatFileSize(file.size)%}</span>
                                </td> {% if (file.error) { %}
                                <td class="error" width="20%" colspan="2">
                                    <span class="label label-danger">Error</span> {%=file.error%}</td> {% } else if (o.files.valid && !i) { %}
                                <td>
                                    <p class="size">{%=o.formatFileSize(file.size)%}</p>
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                </td> {% } else { %}
                                <td colspan="2"></td> {% } %}
                                <td class="cancel" width="10%" align="right">{% if (!i) { %}
                                    <button class="btn btn-sm red cancel">
                                        <i class="fa fa-ban"></i>
                                        <span>Cancel</span>
                                    </button> {% } %}</td>
                            </tr> {% } %} </script>
                        <!-- The template to display files available for download -->
                        <script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-download fade"> {% if (file.error) { %}
                                <td class="name" width="30%">
                                    <span>{%=file.name%}</span>
                                </td>
                                <td class="size" width="40%">
                                    <span>{%=o.formatFileSize(file.size)%}</span>
                                </td>
                                <td class="error" width="30%" colspan="2">
                                    <span class="label label-danger">Error</span> {%=file.error%}</td> {% } else { %}
                                <td class="name" width="30%">
                                    <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                                </td>
                                <td class="size" width="40%">
                                    <span>{%=o.formatFileSize(file.size)%}</span>
                                </td>
                                <td colspan="2"></td> {% } %}
                                <td class="delete" width="10%" align="right">
                                    <button class="btn default btn-sm" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}" {% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr> {% } %} </script>
                        <div class="inbox-compose-btn">
                            <button class="btn green">
                                <i class="fa fa-check"></i>Send</button>
                            <button class="btn default">Discard</button>
                            <button class="btn default">Draft</button>
                        </div>
                        <span class="alert alert-error">Upload server currently unavailable - Wed Jun 05 2019 12:55:34 GMT+0530 (India Standard Time)</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    <div class="page-quick-sidebar">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                    <span class="badge badge-danger">2</span>
                </a>
            </li>
            <li>
                <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                    <span class="badge badge-success">7</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-bell"></i> Alerts </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-info"></i> Notifications </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-speech"></i> Activities </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-settings"></i> Settings </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                    <h3 class="list-heading">Staff</h3>
                    <ul class="media-list list-items">
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-success">8</span>
                            </div>
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar3.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Bob Nilson</h4>
                                <div class="media-heading-sub"> Project Manager </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar1.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Nick Larson</h4>
                                <div class="media-heading-sub"> Art Director </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-danger">3</span>
                            </div>
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar4.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Deon Hubert</h4>
                                <div class="media-heading-sub"> CTO </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar2.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Ella Wong</h4>
                                <div class="media-heading-sub"> CEO </div>
                            </div>
                        </li>
                    </ul>
                    <h3 class="list-heading">Customers</h3>
                    <ul class="media-list list-items">
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-warning">2</span>
                            </div>
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar6.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Lara Kunis</h4>
                                <div class="media-heading-sub"> CEO, Loop Inc </div>
                                <div class="media-heading-small"> Last seen 03:10 AM </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="label label-sm label-success">new</span>
                            </div>
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar7.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Ernie Kyllonen</h4>
                                <div class="media-heading-sub"> Project Manager,
                                    <br> SmartBizz PTL </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar8.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Lisa Stone</h4>
                                <div class="media-heading-sub"> CTO, Keort Inc </div>
                                <div class="media-heading-small"> Last seen 13:10 PM </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-success">7</span>
                            </div>
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar9.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Deon Portalatin</h4>
                                <div class="media-heading-sub"> CFO, H&D LTD </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar10.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Irina Savikova</h4>
                                <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-danger">4</span>
                            </div>
                            <img class="media-object" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar11.jpg')}}" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Maria Gomez</h4>
                                <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                <div class="media-heading-small"> Last seen 03:10 AM </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="page-quick-sidebar-item">
                    <div class="page-quick-sidebar-chat-user">
                        <div class="page-quick-sidebar-nav">
                            <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                <i class="icon-arrow-left"></i>Back</a>
                        </div>
                        <div class="page-quick-sidebar-chat-user-messages">
                            <div class="post out">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar3.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> When could you send me the report ? </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar2.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> Its almost done. I will be sending it shortly </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar3.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> Alright. Thanks! :) </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar2.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:16</span>
                                    <span class="body"> You are most welcome. Sorry for the delay. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar3.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> No probs. Just take your time :) </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar2.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:40</span>
                                    <span class="body"> Alright. I just emailed it to you. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar3.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> Great! Thanks. Will check it right away. </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar2.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:40</span>
                                    <span class="body"> Please let me know if you have any comment. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="{{ asset('themes/admin/assets/layouts/layout4/img/avatar3.jpg')}}" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                </div>
                            </div>
                        </div>
                        <div class="page-quick-sidebar-chat-user-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type a message here...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn green">
                                        <i class="icon-paper-clip"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                <div class="page-quick-sidebar-alerts-list">
                    <h3 class="list-heading">General</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 4 pending tasks.
                                            <span class="label label-sm label-warning "> Take action
                                                <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> Just now </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-danger">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> New order received with
                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 30 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> Web server hardware needs to be upgraded.
                                            <span class="label label-sm label-warning"> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 2 hours </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <h3 class="list-heading">System</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 4 pending tasks.
                                            <span class="label label-sm label-warning "> Take action
                                                <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> Just now </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> New order received with
                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 30 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-warning">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> Web server hardware needs to be upgraded.
                                            <span class="label label-sm label-default "> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 2 hours </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                <div class="page-quick-sidebar-settings-list">
                    <h3 class="list-heading">General Settings</h3>
                    <ul class="list-items borderless">
                        <li> Enable Notifications
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Allow Tracking
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Log Errors
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Auto Sumbit Issues
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Enable SMS Alerts
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <h3 class="list-heading">System Settings</h3>
                    <ul class="list-items borderless">
                        <li> Security Level
                            <select class="form-control input-inline input-sm input-small">
                                <option value="1">Normal</option>
                                <option value="2" selected>Medium</option>
                                <option value="e">High</option>
                            </select>
                        </li>
                        <li> Failed Email Attempts
                            <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                        <li> Secondary SMTP Port
                            <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                        <li> Notify On System Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Notify On SMTP Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <div class="inner-content">
                        <button class="btn btn-success">
                            <i class="icon-settings"></i> Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('themes/admin/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js')}} " type="text/javascript"></script>
<script src="{{ asset('themes/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js')}} " type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        var selector, elems, makeActive;

        selector = '#list li';

        elems = document.querySelectorAll(selector);

        makeActive = function () {
            for (var i = 0; i < elems.length; i++)
                elems[i].classList.remove('active');
            
            this.classList.add('active');
        };

        for (var i = 0; i < elems.length; i++)
            elems[i].addEventListener('mousedown', makeActive);

        
        $("#table1").show();
        $("#viewMessage").hide();
        $("#fileupload").hide();

        $("#list li").on('click', function() {
            var val=($(this).data("type"));
            $("#msgMethodVal").html(val);

            $("#table1").show();
            $("#viewMessage").hide();
            $("#fileupload").hide();
            // $(".inbox-content").html(html);
        });

        $(".view-message").on('click', function() {
            $("#msgMethodVal").html("View Message");

            $("#table1").hide();
            $("#viewMessage").show();
            $("#fileupload").hide();
            // $(".inbox-content").html(html);

            $(".reply-btn").on('click', function() {
                $("#msgMethodVal").html("Reply");
                $("#table1").hide();
                $("#viewMessage").hide();
                $("#fileupload").show();
                /*$.ajax({
                    type: "GET",
                    url: "app_inbox_replay",
                    success: function (result)
                    {
                        $('.inbox-content').html(result);
                        console.log($('#reply_email_content_body').html());
                        // $('[name="message"]').val($('#reply_email_content_body').html());
                    },
                    error: function (error) {
                        alert(error);
                    }
                });*/
            });
        });
    });
</script>
@endsection