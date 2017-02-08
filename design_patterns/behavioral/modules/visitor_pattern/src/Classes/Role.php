<?php

namespace Drupal\visitor_pattern\Classes;
interface Role
{
    public function accept(RoleVisitorInterface $visitor);
}
