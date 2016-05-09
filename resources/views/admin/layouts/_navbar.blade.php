<li class="treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>اعدادات الموقع</span> <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="{!! url('/adminPanel/settings') !!}"><i class="fa fa-circle-o"></i>اعدادات رئيسية</a></li>
      <li><a href="index2.html"><i class="fa fa-circle-o"></i>اعدادات أخرى</a></li>
    </ul>
</li>

{{-- users --}}

<li class="treeview">
    <a href="#">
      <i class="fa fa-users"></i> <span>التحكم فى الاعضاء</span> <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="{!! url('/adminPanel/users/create') !!}"><i class="fa fa-circle-o"></i> اضف عضو </a></li>
      <li><a href="{!! url('/adminPanel/users') !!}"><i class="fa fa-circle-o"></i> كل الاعضاء </a></li>
    </ul>
</li>


{{-- bu --}}

<li class="treeview">
    <a href="#">
      <i class="fa fa-users"></i> <span>التحكم فى العقارات</span> <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="{!! url('/adminPanel/bu/create') !!}"><i class="fa fa-circle-o"></i> اضف عقار </a></li>
      <li><a href="{!! url('/adminPanel/bu') !!}"><i class="fa fa-circle-o"></i> كل العقارات </a></li>
    </ul>
</li>