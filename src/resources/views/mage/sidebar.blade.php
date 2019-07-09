<li class="nav-header">@lang('mage-bdd.sidebar.title')</li>

@can('mage-bdd-zone', 'mage')
    <li class="nav-item">
        <a href="{{ route('mage-bdd.domain.index') }}" class="nav-link {{ !isRoute(['mage-bdd.dashboard']) ?: 'active' }}">
        <span class="nav-icon">
            <i data-feather="message-circle"></i>
        </span>
            <span class="nav-text">@lang('mage-bdd.sidebar')</span>
        </a>
    </li>
@endcan