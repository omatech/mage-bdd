@can('mage-bdd-configuration-zone', 'mage')
    <li class="nav-item">
        <a href="#" class="nav-link {{ !isRoute(['mage-bdd.configuration']) ?: 'active' }}">
        <span class="nav-icon">
            <i data-feather="settings"></i>
        </span>
            <span class="nav-text">@lang('mage-bdd.sidebar.plugins.configuration')</span>
        </a>
    </li>
@endcan