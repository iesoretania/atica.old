<?php

/**
 * ATICA server app. API version 1.
 *
 * @package   atica
 * @copyright 2012 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */
include_once('includes.inc.php');

function addLog($kind = null, $detail = null, $personId = null, $organizationId = null, $categoryId = null, $groupingId = null, $activityId = null, $eventId = null, $folderId = null, $deliveryId = null, $revisionId = null, $documentId = null) {
    $mlog = new Log();
    $mlog->setWhen(new DateTime);
    $mlog->setIp($_SERVER['REMOTE_ADDR']);
    $mlog->setKind($kind);
    $mlog->setDetail($detail);
    $mlog->setPersonId($personId);
    $mlog->setOrganizationId($organizationId);
    $mlog->setCategoryId($categoryId);
    $mlog->setGroupingId($groupingId);
    $mlog->setActivityId($activityId);
    $mlog->setEventId($eventId);
    $mlog->setFolderId($folderId);
    $mlog->setDeliveryId($deliveryId);
    $mlog->setRevisionId($revisionId);
    $mlog->setDocumentId($documentId);
    $mlog->save();
}

class v1 {

    private function isAuthenticated() {
        if (FALSE === isset($_GET['token'])) {
            return FALSE;
        } else {
            $num = SessionQuery::create()->filterById($_GET['token'])->filterByExpiration(array('min' => 'now'))->count();
            return ($num > 0);
        }
    }

    private function arrayToObject($arr) {
        foreach ($arr as $item) {
            $out[$item['Id']] = $item;
        }
        return $out;
    }

    private function randomBase64($len = 16) {
        $str = '';
        $base = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!$';
        for ($i = 0; $i < $len; $i++) {
            $str .= $base[mt_rand(0, 63)];
        }
        return $str;
    }

    public function version() {
        return array("version" => "1");
    }

    /* public function postLogindata($userName = "", $request_data) {
      if (empty($request_data)) {
      throw new RestException(412, "requestData is null");
      }
      if (empty($userName)) {
      throw new RestException(412, "userName is null");
      }
      $password = $request_data['password'];
      //$snapshotId = $request_data['snapshot'];

      $q = PersonQuery::create()->filterByUserName($userName)->
      filterByPassword(sha1($GLOBALS['CFG']['password_salt'] . $password))->findOne();

      if (count($q) == 0) {
      addLog("init-login", "Usuario '$userName' no encontrado");
      throw new RestException(404); //, sha1($GLOBALS['CFG']['password_salt'] . $Password));
      }
      $poQuery = PersonOrganizationQuery::create()->filterByPerson($q)->filterByIsActive(true)->find();
      $snapsQuery = SnapshotQuery::create()->filterByVisible(true)->useOrganizationQuery()->filterByPersonOrganization($poQuery)->endUse();
      //

      /* if (isset($snapshotId)) {
      $snapsQuery = $snapsQuery->filterById($snapshotId);
      } *

      $snaps = $snapsQuery->find();

      /* if ($snaps->count() == 1) {
      $session = new Session();

      $key = v1::randomBase64();
      $session->setId($key);
      $session->setPerson($q);
      $session->setSnapshot($snaps->getFirst());

      $d = new DateTime();
      $d->modify('+1 hour');
      $session->setExpiration($d);

      $session->save();

      return array('Status' => 'ok', 'AccessToken' => $key, 'ExpiresIn' => 3600);
      } /

      if ($snaps->count() == 0) {
      addLog("init-login", "No existen snapshots asociados al usuario", $personId = $q->getId() ) ;
      header("HTTP/1.1 404 Snapshot not found");
      return array('error' => array('code' => 404, 'loginerror' => 1, 'message' => 'No snapshot found'));
      }

      $orgs = PersonOrganizationQuery::create()->filterByPerson($q)->filterByIsActive(true)->find();

      $belongs = array();

      foreach ($orgs as $key => $org) {
      //print_r($org);
      $snaps = SnapshotQuery::create()->filterByOrganizationId($org->getOrganizationId())->filterByVisible(true)->orderBy("OrderNr", Criteria::DESC)->find();
      $snapjson = array();

      foreach ($snaps as $snap) {
      $snapjson[] = $snap->toArray();
      }

      $ar = array(); //$org->toArray();
      $ar["organization"] = $org->getOrganization()->toArray(BasePeer::TYPE_STUDLYPHPNAME);
      $ar["snapshots"] = $snapjson;
      $belongs[] = $ar;
      }

      $copy = array(); //$q->toArray();
      $copy['id'] = $q->getId();
      $copy['userName'] = $q->getUserName();
      $copy['displayName'] = $q->getDisplayName();
      $copy['description'] = $q->getDescription();
      $copy['gender'] = $q->getGender();
      $copy['isGlobalAdministrator'] = $q->getIsGlobalAdministrator();
      //$orgs = $orgs->toArray();
      //header("HTTP/1.1 300 Need to specify organization");

      /* foreach ($orgs as $key => $org) {
      array_push($belongs, array("OrganizationId" => $org["OrganizationId"], "IsLocalAdministrator" => $org["IsLocalAdministrator"]));
      } /

      //return array('Status' => 'error', 'ErrorCode' => 2, 'Message' => 'Need to specify organization', 'Matched' => $belongs, 'Organizations' => $q->toArray());
      return array('user' => $copy, 'snapshots' => $belongs);
      }

      public function organizationsnapshots($organizationId) {

      $snapshot = SnapshotQuery::create()->filterByOrganizationId($organizationId)->filterByVisible(true)->orderByOrderNr(Criteria::DESC)->find();
      if (count($snapshot) == 0)
      throw new RestException(404); //, SnapshotQuery::create()->filterByOrganizationId($organizationId)->filterByVisible(true)->orderByOrderNr(Criteria::DESC)->toString());

      return $snapshot->toArray();
      } */

    /* public function guestgrouping($snapshotId) {

      $q = GroupingQuery::create()->filterBySnapshotId($snapshotId)->orderByOrderNr()->filterByGuestAccess(true)->find();
      if (count($q) == 0) {
      throw new RestException(404); //, SnapshotQuery::create()->filterByOrganizationId($organizationId)->filterByVisible(true)->orderByOrderNr(Criteria::DESC)->toString());
      }
      return $q->toArray();
      }

      public function grouping($id) {

      $q0 = GroupingFolderQuery::create()->filterByGroupingId($id)->orderByOrderNr()->find();
      //FolderQuery::create()->filterBySnapshotId($snapshotId)->orderByOrderNr()->filterByGuestAccess(true)->find();
      $q = FolderQuery::create()->filterByGroupingFolder($q0)->find();
      if (count($q) == 0) {
      throw new RestException(404); //, SnapshotQuery::create()->filterByOrganizationId($organizationId)->filterByVisible(true)->orderByOrderNr(Criteria::DESC)->toString());
      }
      return $q->toArray();
      } */

    protected function test() {
        return array('status' => 'ok');
    }

    /* protected function userdata($userId) {
      $q = SessionQuery::create()->filterById($_GET['token'])->findOne()->getPerson();
      if (count($q) == 0)
      throw new RestException(404);
      $copy = $q->toArray();
      unset($copy['Password']);
      return $copy;
      } */

    /* protected function userprofiles($userId) {
      $q = SessionQuery::create()->filterById($_GET['token'])->findOne()->getPerson();
      if (count($q) == 0)
      throw new RestException(404);
      $copy = $q->toArray();
      unset($copy['Password']);
      return $copy;
      } */

    ///
    protected function postRefreshtoken() {
        $session = SessionQuery::create()->filterById($_GET['token'])->findOne();
        if (count($session) == 0)
            throw new RestException(404);

        $d = new DateTime();
        $d->modify('+1 hour');
        $session->setExpiration($d);

        $session->save();

        return array('status' => 'ok', 'accessToken' => $key, 'expiresIn' => 60*30);
    }

    protected function postLogout() {
        $session = SessionQuery::create()->filterById($_GET['token'])->findOne();
        if (count($session) == 0) {
            addLog("logout-error", "No existe el token especificado", $personId = $session->getPersonId(), $organizationId = $session->getOrganizationId());
            throw new RestException(404);
        }
        addLog("logout", "Salida del sistema", $personId = $session->getPersonId(), $organizationId = $session->getOrganizationId());

        $session->delete();

        return array('status' => 'ok');
    }

    public function postAuth($request_data) {
        if (empty($request_data)) {
            throw new RestException(412, "requestData is null");
        }

        $password = $request_data['password'];
        $userName = $request_data['username'];
        $organizationId = $request_data['organization_id'];

        $q = PersonQuery::create()->filterByUserName($userName)->findOne();

        if (count($q) == 0) {
            addLog("auth", "Usuario '$userName' no encontrado");
            throw new RestException(404, "user not found");
        }

        $currentDateTime = new DateTime();

        // user found, check if blocked
        if (($q->getBlockedAccess() != NULL) && ($q->getBlockedAccess('U') > $currentDateTime->format('U'))) {
            addLog("auth", "Intento de acceso de usuario bloqueado", $personId = $q->getId());
            throw new RestException(403, "Too many tries, blocked for 10 minutes.");
        }

        // check password
        if ($q->getPassword() !== sha1($GLOBALS['CFG']['password_salt'] . $password)) {
            $count = $q->getBadPasswordCount() + 1;
            $q->setBadPasswordCount($count);

            if ($count > 4) {
                $currentDateTime->modify('+10 minutes');
                $q->setBlockedAccess($currentDateTime);
                $q->save();
                addLog("auth", "Contraseña incorrecta. Usuario bloqueado 10 minutos", $personId = $q->getId());
                throw new RestException(403, "Too many tries, blocked for 10 minutes!");
            }
            $q->save();
            addLog("auth", "Contraseña incorrecta. $count intentos consecutivos", $personId = $q->getId());
            throw new RestException(404, "User not found.");
        }

        $copy = array(); //$q->toArray();
        $copy['id'] = $q->getId();
        $copy['userName'] = $q->getUserName();
        $copy['displayName'] = $q->getDisplayName();
        $copy['description'] = $q->getDescription();
        $copy['gender'] = $q->getGender();
        $copy['isGlobalAdministrator'] = $q->getIsGlobalAdministrator();
        $copy['lastLogin'] = $q->getLastLogin("U") * 1000;

        $poQuery = PersonOrganizationQuery::create()->filterByPerson($q)->filterByOrganizationId($organizationId)->filterByIsActive(true)->find();

        if (count($poQuery) == 0) {
            addLog("auth", "El usuario no pertenece a la organización", $personId = $q->getId(), $organizationId = $organizationId);
            throw new RestException(404, "user does not belong to organization");
        }
        $po = $poQuery->getFirst();

        $profileQuery = ProfileQuery::create()->joinPersonProfile()->usePersonProfileQuery()->filterByPerson($q)->endUse()->useProfileGroupQuery()->useSnapshotQuery()->filterByVisible(true)->filterByOrganizationId($organizationId)->endUse()->endUse()->find();

        $copy['profiles'] = array();
        $profileData = $profileQuery->toArray("Id", false, BasePeer::TYPE_STUDLYPHPNAME);

        $profileGroupData = array();

        foreach ($profileQuery as $prof) {
            $profgroup = $prof->getProfileGroup();
            /* if (!isset($copy['Profiles'][$profgroup->getId()])) {
              $copy['Profiles'][$profgroup->getId()] = array();
              } */
            $copy['profiles'][$profgroup->getSnapshotId()][] = $prof->getId();
            $pg = $profgroup->toArray(BasePeer::TYPE_STUDLYPHPNAME);
            $pg['displayName'] = array($pg['displayNameMale'], $pg['displayNameFemale'], $pg['displayNameNeutral']);
            unset($pg['displayNameMale']);
            unset($pg['displayNameFemale']);
            unset($pg['displayNameNeutral']);
            $profileGroupData[$prof->getProfileGroupId()] = $pg;
        }

        $snapshots = SnapshotQuery::create()->filterByOrganizationId($organizationId)->filterByVisible(true)->orderByRank()->find();
        $defaultsnap = $snapshots->getFirst()->getId();
        $snapshots = $snapshots->toArray("Id", false, BasePeer::TYPE_STUDLYPHPNAME);

        $session = new Session();

        $key = v1::randomBase64();
        $session->setId($key);
        $session->setPerson($q);
        $session->setOrganizationId($organizationId);

        $q->setLastLogin($currentDateTime);
        $q->setBadPasswordCount(0);
        $q->setBlockedAccess('');
        $q->save();

        $currentDateTime->modify('+1 hour');
        $session->setExpiration($currentDateTime);

        $session->save();

        // clean older sessions
        $old = SessionQuery::create()->filterByExpiration(array('max' => 'now'))->find();
        foreach($old as $ses) {
            addLog("logout", "Salida del sistema forzosa", $personId = $ses->getPersonId(), $organizationId = $ses->getOrganizationId());
        }
        $old->delete();

        addLog("login", "El usuario se ha conectado", $personId = $q->getId(), $organizationId = $organizationId);

        return array('status' => 'ok', 'accessToken' => $key, 'expiresIn' => 60*30, 'snapshotId' => $defaultsnap, 'snapshots' => $snapshots, 'profiles' => $profileData, 'profileGroups' => $profileGroupData, 'userData' => $copy, 'isLocalAdministrator' => $po->getIsLocalAdministrator());
    }

    public function organization($organizationId) {
        if (isset($organizationId)) {
            $q = OrganizationQuery::create()->filterById($organizationId)->findOne();
        } else {
            $q = OrganizationQuery::create()->find();
        }
        if (count($q) == 0) {
            throw new RestException(404);
        }
        return $q->toArray('Id', false, BasePeer::TYPE_STUDLYPHPNAME); //v1::ArrayToObject($q->toArray());
    }

    public function grouping($profileGroupId) {

        $out = array();
        $order = array();
        $folders = array();

        if (isset($_GET['guest'])) {
            if (is_numeric($_GET['guest']) == false) {
                throw new RestException(400);
            }
            $snap = SnapshotQuery::create()->filterByOrganizationId($_GET['guest'])->filterByVisible(true)->orderByRank()->findOne();
            // ->select(array('Id', 'Title', 'Content', 'Category.Name')
            if (count($snap) == 0) {
                throw new RestException(404, "No snapshots");
            }
            $q = GroupingQuery::create()->filterBySnapshot($snap)->filterByGuestAccess(true)->orderByRank()->find();

            foreach ($q as $group) {

                $elem = $group->toArray(BasePeer::TYPE_STUDLYPHPNAME);

                if ($_GET['folders']) {
                    $elem['folders'] = array();
                    //$gfolders = $group->getGroupingFolders();
                    $gfolders = GroupingFolderQuery::create()->filterByGrouping($group)->orderByRank()->find();
                    //$elem['GFolders'] = $gfolders->toArray();
                    foreach ($gfolders as $gfolder) {
                        /* if ($_GET['folders'] == 1) { */
                        $folder = $gfolder->getFolder();
                        //$folder = new Folder();
                        $foldarray = $folder->toArray(BasePeer::TYPE_STUDLYPHPNAME);
                        if (strlen($gfolder->getAltDisplayName()) > 0) {
                            $foldarray['displayName'] = $gfolder->getAltDisplayName();
                        }
                        //} else {*/
                        //$foldarray = $gfolder->getFolderId();
                        //}
                        $elem['folders'][] = $gfolder->getFolderId();
                        $folders[$gfolder->getFolderId()] = $foldarray;
                    }
                }
                $order[] = $elem['id'];
                $out[$group->getId()] = $elem;
            }
        } else {
            if (!v1::isAuthenticated()) {
                addLog("security", "Acceso a grouping sin token");
                throw new RestException(401);
            }
            // TODO: Implementar acceso por grupo de perfiles

            /* $q = GroupingQuery::create()->filterBySnapshotId($snapshotId)->orderByRank()->find();
              if (count($q) == 0) {
              throw new RestException(404, "Snapshot not found"); //, SnapshotQuery::create()->filterByOrganizationId($organizationId)->filterByVisible(true)->orderByOrderNr(Criteria::DESC)->toString());
              } */
        }

        return array('groupingsOrder' => $order, 'groupings' => $out, 'folders' => $folders);
    }

    protected function snapshotdata($snapshotId) {

        // TODO: Check if Snapshot belongs to user
        // profiles / profileGroups / persons
        $profileGroupsQ = ProfileGroupQuery::create()->filterBySnapshotId($snapshotId)->find();

        $profilesQ = ProfileQuery::create()->filterByProfileGroup($profileGroupsQ)->find();
        $profiles = $profilesQ->toArray('Id', false, BasePeer::TYPE_STUDLYPHPNAME);

        $personsQ = PersonQuery::create()->usePersonProfileQuery()->filterByProfile($profilesQ)->endUse()->find();
        $persons = array();

        foreach ($personsQ as $q) {
            $copy = array(); //$q->toArray();
            $copy['id'] = $q->getId();
            //$copy['userName'] = $q->getUserName();
            $copy['displayName'] = $q->getDisplayName();
            $copy['description'] = $q->getDescription();
            $copy['gender'] = $q->getGender();
            $persons[$q->getId()] = $copy;
        }

        $profileGroups = array();
        foreach ($profileGroupsQ as $profileGroup) {
            $pg = $profileGroup->toArray(BasePeer::TYPE_STUDLYPHPNAME);
            $pg['displayName'] = array($pg['displayNameMale'], $pg['displayNameFemale'], $pg['displayNameNeutral']);
            unset($pg['displayNameMale']);
            unset($pg['displayNameFemale']);
            unset($pg['displayNameNeutral']);
            $profileGroups[$profileGroup->getId()] = $pg;

            $profileGroups[$profileGroup->getId()]['events'] = array();
            $eventProfileGroups = $profileGroup->getEventProfileGroups();
            foreach ($eventProfileGroups as $eventProfileGroup) {
                $profileGroups[$profileGroup->getId()]['events'][] = $eventProfileGroup->getEventId();
            }

            $profileGroups[$profileGroup->getId()]['activities'] = array();
            $activityProfileGroups = $profileGroup->getActivityProfileGroups();
            foreach ($activityProfileGroups as $activityProfileGroup) {
                $profileGroups[$profileGroup->getId()]['activities'][] = $activityProfileGroup->getActivityId();
            }

            $profileGroups[$profileGroup->getId()]['groupings'] = array();
            $groupingProfileGroups = $profileGroup->getGroupingProfileGroups();
            foreach ($groupingProfileGroups as $groupingProfileGroup) {
                $profileGroups[$profileGroup->getId()]['groupings'][] = $groupingProfileGroup->getGroupingId();
            }
            
            
        }

        // events

        $eventsQ = EventQuery::create()->filterBySnapshotId($snapshotId)->find();
        $events = $eventsQ->toArray('Id', false, BasePeer::TYPE_STUDLYPHPNAME);

        $activitiesQ = ActivityQuery::create()->filterBySnapshotId($snapshotId)->find();
        $activities = $activitiesQ->toArray('Id', false, BasePeer::TYPE_STUDLYPHPNAME);

        // groupings

        $groupings = array();

        $q = GroupingQuery::create()->filterBySnapshotId($snapshotId)->orderByRank()->find();

        foreach ($q as $group) {

            $elem = $group->toArray(BasePeer::TYPE_STUDLYPHPNAME);

            $elem['folders'] = array();
            //$gfolders = $group->getGroupingFolders();
            $gfolders = GroupingFolderQuery::create()->filterByGrouping($group)->orderByRank()->find();
            //$elem['GFolders'] = $gfolders->toArray();
            foreach ($gfolders as $gfolder) {
                $foldarray = $gfolder->getFolderId();
                $elem['folders'][] = $foldarray;
            }

            $groupings[$elem['id']] = $elem;
        }

        // folders
        $foldersQ = FolderQuery::create()->filterBySnapshotId($snapshotId)->find();
        $folders = $foldersQ->toArray('Id', false, BasePeer::TYPE_STUDLYPHPNAME);
        
        foreach ($foldersQ as $folder) {
            $folders[$folder->getId()]['managers'] = array();
            $folderPermissions = FolderPermissionQuery::create()->filterByFolder($folder)->filterByPermission('manage')->find();
            foreach ($folderPermissions as $folderPermission) {
                $folders[$folder->getId()]['managers'][] = $folderPermission->getProfileGroupId();
            }
            $folders[$folder->getId()]['uploaders'] = array();
            $folderPermissions = FolderPermissionQuery::create()->filterByFolder($folder)->filterByPermission('upload')->find();
            foreach ($folderPermissions as $folderPermission) {
                $folders[$folder->getId()]['uploaders'][] = $folderPermission->getProfileGroupId();
            }
        }
        return array('persons' => $persons, 'profiles' => $profiles, 'profileGroups' => $profileGroups, 'events' => $events, 'activities' => $activities, 'groupings' => $groupings, 'folders' => $folders);
    }

    public function folder($folderId) {

        if (isset($_GET['guest'])) {
            $folder = GroupingFolderQuery::create()->useGroupingQuery()->filterByGuestAccess(true)->endUse()->filterByFolderId($folderId)->findOne();
            if (count($folder) == 0) {
                throw new RestException(404, "Folder not found");
            }
            $deliveries = DeliveryQuery::create()->orderByProfileId()->useFolderDeliveryQuery()->filterByFolderId($folderId)->orderByRank()->endUse()->find();
        } else {
            if (v1::IsAuthenticated()) {
                $deliveries = DeliveryQuery::create()->orderByProfileId()->useFolderDeliveryQuery()->filterByFolderId($folderId)->orderByRank()->endUse()->find();
            } else {
                throw new RestException(401);
            }
        }

        /* if (count($deliveries) == 0) {
          throw new RestException(404);
          } */
        $orderD = array();
        $orderP = array();
        $out = $deliveries->toArray('Id', false, BasePeer::TYPE_STUDLYPHPNAME);
        $lastProfileId = "";
        foreach ($deliveries as $delivery) {
            $id = $delivery->getId();
            if ($delivery->getProfileId() !== $lastProfileId) {
                $lastProfileId = $delivery->getProfileId();
                $orderP[] = $lastProfileId;
            }
            $orderD[$lastProfileId][] = $id;

            $out[$id]['creationDate'] = ($delivery->getCreationDate("U")) * 1000; //->getTimestamp();
            $out[$id]['revisions'] = array();
            $out[$id]['revisionsOrder'] = array();

            $revisions = RevisionQuery::create()->filterByDeliveryId($delivery->getId())->orderByRank()->find();
            $out[$id]['revisions'] = $revisions->toArray('Id', false, BasePeer::TYPE_STUDLYPHPNAME);
            foreach ($revisions as $revision) {
                $out[$id]['revisions'][$revision->getId()]['uploadDate'] = ($revision->getUploadDate("U")) * 1000;
                $out[$id]['revisionsOrder'][] = $revision->getId();
            }
        }
        return array('profilesOrder' => $orderP, 'deliveriesOrder' => $orderD, 'deliveries' => $out);
    }

    protected function category($categoryId) {
        if (isset($_GET['snapshotId'])) {
            $categoriesRoot = CategoryQuery::create()->treeRoots()->filterBySnapshotId($_GET['snapshotId'])->findOne();
            if (count($categoriesRoot) == 0) {
                throw new RestException(404, "Snapshot not found.");
            }
            $categories = CategoryQuery::create()->childrenOf($categoriesRoot)->find();
            $categoriesArray = $categories->toArray('Id', false, BasePeer::TYPE_STUDLYPHPNAME);
            $categoriesOrder = array();

            foreach ($categories as $category) {
                $categoriesArray[$category->getId()]['items'] = array();
                $categoriesOrder[] = $category->getId();
                $first = true;
                $order = array();
                foreach ($category->getBranch() as $subcategory) {
                    if ($first) {
                        $first = false;
                    } else {
                        $data = array();
                        $data['id'] = $subcategory->getId();
                        $data['categoryLevel'] = $subcategory->getCategoryLevel();
                        $data['displayName'] = $subcategory->getDisplayName();
                        $data['description'] = $subcategory->getDescription();
                        $order[] = $subcategory->getId();
                        $categoriesArray[$subcategory->getId()] = $data;
                        $categoriesArray[$subcategory->getId()]['folders'] = array();

                        $cfolders = CategoryFolderQuery::create()->filterByCategory($subcategory)->find();
                        foreach ($cfolders as $cfolder) {
                            $categoriesArray[$subcategory->getId()]['folders'][] = $cfolder->getFolderId();
                        }
                    }
                }
                $categoriesArray[$category->getId()]['order'] = $order;
            }
            return array('status' => 'ok', 'categoriesOrder' => $categoriesOrder, 'categories' => $categoriesArray);
        } else {
            
        }
    }

}
