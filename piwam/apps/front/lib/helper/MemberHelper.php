<?php
/**
 * Format a member object to display it correctly with a link
 * to it.
 *
 * @param 	Member    $member
 * @param	  boolean	  $pseudo : display only the pseudo
 * @return 	string
 * @since	  r8
 */
function format_member($member, $pseudo = false)
{
  if ($member instanceof sfOutputEscaper)
  {
    $member = $member->getRawValue();
  }

  if (! $member->exists())
  {
    $str = '<i>Système</i>';
  }
  else
  {
    if ($member->getState() == MemberTable::STATE_ENABLED)
    {
      $str = '<a href="' . url_for('@member_show?id=' . $member->getId()) . '">';
    }

    if ($pseudo)
    {
      $str .= $member->getUsername();
    }
    else
    {
      $str .= $member->getFirstname() . ' ' .$member->getLastname();
    }

    if ($member->getState() == MemberTable::STATE_ENABLED)
    {
      $str .= '</a>';
    }
    else
    {
      $str .= ' (<i>supprimé</i>)';
    }
  }

  return $str;
}
?>