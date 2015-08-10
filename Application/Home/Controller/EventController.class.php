<?php
namespace Home\Controller;
use Think\Controller;
class EventController extends Controller {
	private $pinnacle = "http://research.pinnacle.smu.edu.sg/clear/";
	private $event_type_map = ["All", "Local", "Global"];

	/**
	 * get the information about events with type of $type.
	 * @param  int $type  
	 * @param  int $limit -  get the latest $limit events  with type of $type.
	 * @return object
	 */
	public function types($type, $limit=10){
		$demo_episode = M('demo_episode');
		//echo $demo_episode->where("type={$type}")->order("time desc")->count();
		$result =  array();
		$result['meta']['X-RateLimit-Limit'] = 5000;
		$result['meta']['X-RateLimit-Remaining'] = 4813;
		$result['meta']['X-RateLimit-Reset'] = 1438671351;
		$result['meta']['Cache-Control'] = "public, max-age=60, s-maxage=60";
		$result['meta']['Vary'] = "Accept";
		$result['meta']['ETag'] = "2c2ce72be7b7ff44b0142928f5a9a73d";
		$result['meta']['status'] = 200;
		$data['login'] = $type;
		// $data['login'] = $this->event_type_map[$type];
		$data['type'] = $type;
		$data['repos_url'] = U("Event/events",array('type'=>$type,'limit'=>$limit),true,true);
		$data['public_repos'] = $demo_episode->where("type={$type}")->order("time desc")->limit($limit)->count();
		$data['avatar_url'] = "http://localhost/clear2/Public/image/favicon.ico";

		$result['data'] = $data;

		$this->ajaxReturn($result, 'jsonp');
	}

	public function events($type, $limit=10){
		$demo_episode = M('demo_episode');
		$list = $demo_episode->where("type={$type}")->limit($limit)->select();

		$result =  array();
		$result['meta']['X-RateLimit-Limit'] = 5000;
		$result['meta']['X-RateLimit-Remaining'] = 4813;
		$result['meta']['X-RateLimit-Reset'] = 1438671351;
		$result['meta']['Cache-Control'] = "public, max-age=60, s-maxage=60";
		$result['meta']['Vary'] = "Accept";
		$result['meta']['ETag'] = "2c2ce72be7b7ff44b0142928f5a9a73d";
		$result['meta']['status'] = 200;
		foreach ($list as $row) {
			$event['id'] = $row['eid'];
			$event['name'] = $row['keywords'];
			$event['url'] = $this->pinnacle."detail.php?eid=".$row['eid'];
			$event['html_url'] = $this->pinnacle."detail.php?eid=".$row['eid'];
			$event['commits_url'] = U("Event/users",array('eid'=>$row['eid']),true,true);
			$event['size'] = $row['numtweets'];
			$event['pushed_at'] = $row['time'];
			$event['updated_at'] =  $row['time'];
			$event['created_at'] =  $row['time'];
			$event['description'] =  $row['keywords'];
			$event['language'] = $row['eid'];
			//$event['language'] = $this->event_type_map[$type];
			$event['forks'] =  $row['numgeousers'];
			$event['watchers'] =  $row['numtweets'];
			$event['fork'] =  "false";
			$data[] = $event;
		}
		$result['data'] = $data;
		$this->ajaxReturn($result, 'jsonp');
	}

	public function users($eid=0, $per_page = 100){
		$result =  array();
		$result['meta']['X-RateLimit-Limit'] = 5000;
		$result['meta']['X-RateLimit-Remaining'] = 4813;
		$result['meta']['X-RateLimit-Reset'] = 1438671351;
		$result['meta']['Cache-Control'] = "public, max-age=60, s-maxage=60";
		$result['meta']['Vary'] = "Accept";
		$result['meta']['ETag'] = "2c2ce72be7b7ff44b0142928f5a9a73d";
		$result['meta']['status'] = 200;
		$data_str = '
[
  {
    "sha": "8ffbb5974a1d9e28aa93aefd069610c5162450be",
    "commit": {
      "author": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-10T03:10:56Z"
      },
      "committer": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-10T03:10:56Z"
      },
      "message": "ignore Runtime",
      "tree": {
        "sha": "a4096218b1149183ac5dad0cb364ee9428b67354",
        "url": "https://api.github.com/repos/biaochangb/clear2/git/trees/a4096218b1149183ac5dad0cb364ee9428b67354"
      },
      "url": "https://api.github.com/repos/biaochangb/clear2/git/commits/8ffbb5974a1d9e28aa93aefd069610c5162450be",
      "comment_count": 0
    },
    "url": "http://10.4.8.108/clear2/index.php/Home/Event/retweetUsers.html",
    "html_url": "https://github.com/biaochangb/clear2/commit/8ffbb5974a1d9e28aa93aefd069610c5162450be",
    "comments_url": "https://api.github.com/repos/biaochangb/clear2/commits/8ffbb5974a1d9e28aa93aefd069610c5162450be/comments",
    "author": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "committer": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "parents": [
      {
        "sha": "cc4694eff6e862d4b5c84ed63e67e7859ab44586",
        "url": "https://api.github.com/repos/biaochangb/clear2/commits/cc4694eff6e862d4b5c84ed63e67e7859ab44586",
        "html_url": "https://github.com/biaochangb/clear2/commit/cc4694eff6e862d4b5c84ed63e67e7859ab44586"
      }
    ]
  },
  {
    "sha": "cc4694eff6e862d4b5c84ed63e67e7859ab44586",
    "commit": {
      "author": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-10T03:10:16Z"
      },
      "committer": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-10T03:10:16Z"
      },
      "message": "bs3",
      "tree": {
        "sha": "76ffd09df05c3b8480552ab1631909781ad89de2",
        "url": "https://api.github.com/repos/biaochangb/clear2/git/trees/76ffd09df05c3b8480552ab1631909781ad89de2"
      },
      "url": "https://api.github.com/repos/biaochangb/clear2/git/commits/cc4694eff6e862d4b5c84ed63e67e7859ab44586",
      "comment_count": 0
    },
    "url": "http://10.4.8.108/clear2/index.php/Home/Event/retweetUsers.html",
    "html_url": "https://github.com/biaochangb/clear2/commit/cc4694eff6e862d4b5c84ed63e67e7859ab44586",
    "comments_url": "https://api.github.com/repos/biaochangb/clear2/commits/cc4694eff6e862d4b5c84ed63e67e7859ab44586/comments",
    "author": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "committer": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "parents": [
      {
        "sha": "ed54a190f52d736c191caf347184a8d307b63a14",
        "url": "https://api.github.com/repos/biaochangb/clear2/commits/ed54a190f52d736c191caf347184a8d307b63a14",
        "html_url": "https://github.com/biaochangb/clear2/commit/ed54a190f52d736c191caf347184a8d307b63a14"
      }
    ]
  },
  {
    "sha": "ed54a190f52d736c191caf347184a8d307b63a14",
    "commit": {
      "author": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-07T05:56:20Z"
      },
      "committer": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-07T05:56:20Z"
      },
      "message": "add bootstrap",
      "tree": {
        "sha": "ad5ecfa2eb5b28c947359ddc428bb14d1a07c285",
        "url": "https://api.github.com/repos/biaochangb/clear2/git/trees/ad5ecfa2eb5b28c947359ddc428bb14d1a07c285"
      },
      "url": "https://api.github.com/repos/biaochangb/clear2/git/commits/ed54a190f52d736c191caf347184a8d307b63a14",
      "comment_count": 0
    },
    "url": "http://10.4.8.108/clear2/index.php/Home/Event/retweetUsers.html",
    "html_url": "https://github.com/biaochangb/clear2/commit/ed54a190f52d736c191caf347184a8d307b63a14",
    "comments_url": "https://api.github.com/repos/biaochangb/clear2/commits/ed54a190f52d736c191caf347184a8d307b63a14/comments",
    "author": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "committer": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "parents": [
      {
        "sha": "e053d3f5527bac99393dfb8db4fd4c395c14d799",
        "url": "https://api.github.com/repos/biaochangb/clear2/commits/e053d3f5527bac99393dfb8db4fd4c395c14d799",
        "html_url": "https://github.com/biaochangb/clear2/commit/e053d3f5527bac99393dfb8db4fd4c395c14d799"
      }
    ]
  },
  {
    "sha": "e053d3f5527bac99393dfb8db4fd4c395c14d799",
    "commit": {
      "author": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-06T08:47:46Z"
      },
      "committer": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-06T08:47:46Z"
      },
      "message": "initialize\n\ninitialize",
      "tree": {
        "sha": "c87f1cb02dbdd6883b8608cd77cfeb35b7c24088",
        "url": "https://api.github.com/repos/biaochangb/clear2/git/trees/c87f1cb02dbdd6883b8608cd77cfeb35b7c24088"
      },
      "url": "https://api.github.com/repos/biaochangb/clear2/git/commits/e053d3f5527bac99393dfb8db4fd4c395c14d799",
      "comment_count": 0
    },
    "url": "http://10.4.8.108/clear2/index.php/Home/Event/retweetUsers.html",
    "html_url": "https://github.com/biaochangb/clear2/commit/e053d3f5527bac99393dfb8db4fd4c395c14d799",
    "comments_url": "https://api.github.com/repos/biaochangb/clear2/commits/e053d3f5527bac99393dfb8db4fd4c395c14d799/comments",
    "author": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "committer": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "parents": [
      {
        "sha": "ac5be7103f0a540b58e7d164e8d2d0f64627ee6a",
        "url": "https://api.github.com/repos/biaochangb/clear2/commits/ac5be7103f0a540b58e7d164e8d2d0f64627ee6a",
        "html_url": "https://github.com/biaochangb/clear2/commit/ac5be7103f0a540b58e7d164e8d2d0f64627ee6a"
      }
    ]
  },
  {
    "sha": "ac5be7103f0a540b58e7d164e8d2d0f64627ee6a",
    "commit": {
      "author": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-06T06:16:05Z"
      },
      "committer": {
        "name": "Biao Chang",
        "email": "985966377@qq.com",
        "date": "2015-07-06T06:16:05Z"
      },
      "message": ":confetti_ball: Added .gitattributes & .gitignore files",
      "tree": {
        "sha": "19ce9d8ff1fccf510df82d99a65f48c649b7becd",
        "url": "https://api.github.com/repos/biaochangb/clear2/git/trees/19ce9d8ff1fccf510df82d99a65f48c649b7becd"
      },
      "url": "https://api.github.com/repos/biaochangb/clear2/git/commits/ac5be7103f0a540b58e7d164e8d2d0f64627ee6a",
      "comment_count": 0
    },
    "url": "http://10.4.8.108/clear2/index.php/Home/Event/retweetUsers.html",
    "html_url": "https://github.com/biaochangb/clear2/commit/ac5be7103f0a540b58e7d164e8d2d0f64627ee6a",
    "comments_url": "https://api.github.com/repos/biaochangb/clear2/commits/ac5be7103f0a540b58e7d164e8d2d0f64627ee6a/comments",
    "author": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "committer": {
      "login": "biaochangb",
      "id": 11438882,
      "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
      "gravatar_id": "",
      "url": "https://api.github.com/users/biaochangb",
      "html_url": "https://github.com/biaochangb",
      "followers_url": "https://api.github.com/users/biaochangb/followers",
      "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
      "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
      "organizations_url": "https://api.github.com/users/biaochangb/orgs",
      "repos_url": "https://api.github.com/users/biaochangb/repos",
      "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
      "received_events_url": "https://api.github.com/users/biaochangb/received_events",
      "type": "User",
      "site_admin": false
    },
    "parents": [

    ]
  }
]
';
		$data = array();
		$demo_tweets = M('demo_tweets');
		$demo_users = M('demo_users');
		$rows = $demo_tweets->where("eid={$eid}")->order("createdAt desc")->limit($per_page)->select();
		$user_profiles = array();
		foreach ($rows as $key => $row) {
			if (!array_key_exists($user_profiles)){
				$profile = $demo_users->where("uid=".$row['userid'])->limit(1)->select();
				if (count($profile)>0) {
					$user_profiles[$row['userid']] = $profile[0];
				}else{
					$user_profiles[$row['userid']] = array("screenname"=>"unknown","email"=>"test@qq.com","createdat"=>"1970-00-00 0:0:0","userimageurl"=>"");
				}
			}
			//$user_profiles[$row['userid']]['userimageurl'] = "https://avatars.githubusercontent.com/u/11438882?v=3";
			$commit = array();
			$commit['sha'] = strval($row['userid']);
			$commit['commit']['author']['name'] = $user_profiles[$row['userid']]['screenname'];
			$commit['commit']['author']['email'] = $user_profiles[$row['userid']]['screenname'];
			$commit['commit']['author']['date'] = date("Y-m-d\TH:i:s\Z", strtotime($row['createdat']));
			$commit['commit']['committer']['name'] = $user_profiles[$row['userid']]['screenname'];
			$commit['commit']['committer']['email'] = $user_profiles[$row['userid']]['screenname'];
			$commit['commit']['committer']['date'] = date("Y-m-d\TH:i:s\Z", strtotime($row['createdat']));
			$commit['commit']['message'] = $row['text'];

			$commit['url'] = U("Event/retweetUsers",array('uid'=>$row['userid']),true,true);
			$commit['html_url'] = $commit['url'];

			$commit['author']['avatar_url'] =  $user_profiles[$rows[0]['userid']]['userimageurl'];
			$commit['author']['login'] = $user_profiles[$rows[0]['userid']]['screenname'];
			$commit['committer']['avatar_url'] =$user_profiles[$row['userid']]['userimageurl'];
			$commit['committer']['login'] = $user_profiles[$row['userid']]['screenname'];

			$commit['parents'] = array();
			if ($key>0) {
				$commit['parents'][0]['sha'] = $data[$key-1]['sha'];
				$commit['parents'][0]['url'] = $data[$key-1]['url'];
				$commit['parents'][0]['html_url'] = $data[$key-1]['html_url'];
			}
			$data[] = $commit;
		}
		//var_dump($user_profiles);
		$result['data'] = $data;
		// $result['data'] = json_decode($data_str);
		$this->ajaxReturn($result, 'jsonp');
	}

	public function retweetUsers($uid=0){
		$result =  array();
		$result['meta']['X-RateLimit-Limit'] = 5000;
		$result['meta']['X-RateLimit-Remaining'] = 4813;
		$result['meta']['X-RateLimit-Reset'] = 1438671351;
		$result['meta']['Cache-Control'] = "public, max-age=60, s-maxage=60";
		$result['meta']['Vary'] = "Accept";
		$result['meta']['ETag'] = "2c2ce72be7b7ff44b0142928f5a9a73d";
		$result['meta']['status'] = 200;
		$data = '
{
  "sha": "'.$uid.'",
  "commit": {
    "author": {
      "name": "Biao Chang",
      "email": "985966377@qq.com",
      "date": "2015-07-10T03:10:56Z"
    },
    "committer": {
      "name": "Biao Chang",
      "email": "985966377@qq.com",
      "date": "2015-07-10T03:10:56Z"
    },
    "message": "ignore Runtime",
    "tree": {
      "sha": "a4096218b1149183ac5dad0cb364ee9428b67354",
      "url": "https://api.github.com/repos/biaochangb/clear2/git/trees/a4096218b1149183ac5dad0cb364ee9428b67354"
    },
    "url": "https://api.github.com/repos/biaochangb/clear2/git/commits/8ffbb5974a1d9e28aa93aefd069610c5162450be",
    "comment_count": 0
  },
  "url": "https://api.github.com/repos/biaochangb/clear2/commits/8ffbb5974a1d9e28aa93aefd069610c5162450be",
  "html_url": "https://github.com/biaochangb/clear2/commit/8ffbb5974a1d9e28aa93aefd069610c5162450be",
  "comments_url": "https://api.github.com/repos/biaochangb/clear2/commits/8ffbb5974a1d9e28aa93aefd069610c5162450be/comments",
  "author": {
    "login": "biaochangb",
    "id": 11438882,
    "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
    "gravatar_id": "",
    "url": "https://api.github.com/users/biaochangb",
    "html_url": "https://github.com/biaochangb",
    "followers_url": "https://api.github.com/users/biaochangb/followers",
    "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
    "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
    "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
    "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
    "organizations_url": "https://api.github.com/users/biaochangb/orgs",
    "repos_url": "https://api.github.com/users/biaochangb/repos",
    "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
    "received_events_url": "https://api.github.com/users/biaochangb/received_events",
    "type": "User",
    "site_admin": false
  },
  "committer": {
    "login": "biaochangb",
    "id": 11438882,
    "avatar_url": "https://avatars.githubusercontent.com/u/11438882?v=3",
    "gravatar_id": "",
    "url": "https://api.github.com/users/biaochangb",
    "html_url": "https://github.com/biaochangb",
    "followers_url": "https://api.github.com/users/biaochangb/followers",
    "following_url": "https://api.github.com/users/biaochangb/following{/other_user}",
    "gists_url": "https://api.github.com/users/biaochangb/gists{/gist_id}",
    "starred_url": "https://api.github.com/users/biaochangb/starred{/owner}{/repo}",
    "subscriptions_url": "https://api.github.com/users/biaochangb/subscriptions",
    "organizations_url": "https://api.github.com/users/biaochangb/orgs",
    "repos_url": "https://api.github.com/users/biaochangb/repos",
    "events_url": "https://api.github.com/users/biaochangb/events{/privacy}",
    "received_events_url": "https://api.github.com/users/biaochangb/received_events",
    "type": "User",
    "site_admin": false
  },
  "parents": [
    {
      "sha": "cc4694eff6e862d4b5c84ed63e67e7859ab44586",
      "url": "https://api.github.com/repos/biaochangb/clear2/commits/cc4694eff6e862d4b5c84ed63e67e7859ab44586",
      "html_url": "https://github.com/biaochangb/clear2/commit/cc4694eff6e862d4b5c84ed63e67e7859ab44586"
    }
  ],
  "stats": {
    "total": 1,
    "additions": 1,
    "deletions": 0
  },
  "files": [
    {
      "sha": "122b70d62fc65ec2f204a00b5e1d03d80b80f311'.$uid.'",
      "filename": ".gitignore",
      "status": "modified",
      "additions": 1,
      "deletions": 0,
      "changes": 1,
      "blob_url": "https://github.com/biaochangb/clear2/blob/8ffbb5974a1d9e28aa93aefd069610c5162450be/.gitignore",
      "raw_url": "https://github.com/biaochangb/clear2/raw/8ffbb5974a1d9e28aa93aefd069610c5162450be/.gitignore",
      "contents_url": "https://api.github.com/repos/biaochangb/clear2/contents/.gitignore?ref=8ffbb5974a1d9e28aa93aefd069610c5162450be",
      "patch": "@@ -1,6 +1,7 @@\n # Windows image file caches\n Thumbs.db\n ehthumbs.db\n+Runtime/\n \n # Folder config file\n Desktop.ini"
    },
    {
      "sha": "64f72d4e3e7c39858195a41dfad6d56d5cacde62'.$uid.'",
      "filename": "Public/timeline/js/timeline-min'.$uid.'.js",
      "status": "added",
      "additions": 14,
      "deletions": 0,
      "changes": 14,
      "blob_url": "https://github.com/biaochangb/clear2/blob/cc4694eff6e862d4b5c84ed63e67e7859ab44586/Public/timeline/js/timeline-min.js",
      "raw_url": "https://github.com/biaochangb/clear2/raw/cc4694eff6e862d4b5c84ed63e67e7859ab44586/Public/timeline/js/timeline-min.js",
      "contents_url": "https://api.github.com/repos/biaochangb/clear2/contents/Public/timeline/js/timeline-min.js?ref=cc4694eff6e862d4b5c84ed63e67e7859ab44586"
    },
    {
      "sha": "4bf360b0cc4df7d6e99d803752adc5a39b956d15'.$uid.'",
      "filename": "Public/timeline/js/timeline'.$uid.'.js",
      "status": "added",
      "additions": 10104,
      "deletions": 0,
      "changes": 10104,
      "blob_url": "https://github.com/biaochangb/clear2/blob/cc4694eff6e862d4b5c84ed63e67e7859ab44586/Public/timeline/js/timeline.js",
      "raw_url": "https://github.com/biaochangb/clear2/raw/cc4694eff6e862d4b5c84ed63e67e7859ab44586/Public/timeline/js/timeline.js",
      "contents_url": "https://api.github.com/repos/biaochangb/clear2/contents/Public/timeline/js/timeline.js?ref=cc4694eff6e862d4b5c84ed63e67e7859ab44586"
    }
  ]
}
';
		$result['data'] = json_decode($data);
		$this->ajaxReturn($result, 'jsonp');
	}

    public function profile(){
        	$this->display();
    }

    public function timeline(){
    		$timeline = '{"timeline":{"headline":"The End\uff1a <br>","type":"default","text":"<br>","startDate":"","date":[{"startDate":"2015,07,08,19,17,02","endDate":"","headline":"","text":"squad goals http:\/\/t.co\/Ex4EuB7nF2","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/591143235562569729\/eqjuTSic_normal.jpg"}},{"startDate":"2015,07,08,18,48,52","endDate":"","headline":"","text":". @Guendogan8 on the boring 0-0 draw between SG and Japan:I travelled a long way from Germany to watch the match and I saw 0 goals.","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/616014185789394944\/1OQpWtCs_normal.jpg"}},{"startDate":"2015,07,08,18,41,29","endDate":"","headline":"","text":"rt for an account rate + 3 free follows  layout: \/10 username: \/10 bio: \/10 overall: \/10  Mbf bc goals ifb ?","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/612152088211030016\/25OUp583_normal.jpg"}},{"startDate":"2015,07,08,18,05,13","endDate":"","headline":"","text":".@amageessn tells us Sterling wanting to leave #LFC has nothing to do with money, but with his relationship with BR. http:\/\/t.co\/ZVFcpb1w6N","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/502491052243038208\/gKEvCXwg_normal.png"}},{"startDate":"2015,07,08,18,02,11","endDate":"","headline":"","text":"Micronesia results in the Pacific Games:  0-30 vs Tahiti 0-38 vs Fiji 0-46 vs Vanuatu  Conceding 114 goals in 3 games http:\/\/t.co\/BeiuL5bP1c","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/421766026020130816\/EhAIox75_normal.jpeg"}},{"startDate":"2015,07,08,17,15,06","endDate":"","headline":"","text":"relationship goals . http:\/\/t.co\/WN8Hi7844z","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/567285191169687553\/7kg_TF4l_normal.jpeg"}},{"startDate":"2015,07,08,17,11,01","endDate":"","headline":"","text":"Arda Turan: Scoring? I don\'t have individual goals, but with these teammates and this system, I\'m sure I\'ll be able to score more. [fcb]","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/309654707\/josep_pep_guardiola_barcelona_barca_twitter_normal.jpg"}},{"startDate":"2015,07,08,16,20,37","endDate":"","headline":"","text":"I LOVE THE BOYS SO MUCH. #action1d http:\/\/t.co\/AaKlUOF3R0","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/617582134870437888\/-2n9QOwH_normal.jpg"}},{"startDate":"2015,07,08,16,14,22","endDate":"","headline":"","text":"the boys are using our dedication and the power of the fandom to challenge us to do something good for the world i love them #action1D","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/618403955580604417\/QJs7-S6I_normal.jpg"}},{"startDate":"2015,07,08,16,10,33","endDate":"","headline":"","text":"Patience with others is Love, Patience with the self is Hope, Patience with Allah is Faith.","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/577473483891867649\/QrRGjFOd_normal.jpeg"}},{"startDate":"2015,07,08,16,00,06","endDate":"","headline":"","text":"There\u2019s one person you\u2019ll always love no matter how much pain they put you through.","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/598552562061680640\/Gzcfwi8s_normal.jpg"}},{"startDate":"2015,07,08,15,07,33","endDate":"","headline":"","text":"100 ways to say I love you http:\/\/t.co\/cdEMJ9xLui","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/444385698695479296\/kzkICfZC_normal.png"}},{"startDate":"2015,07,08,14,50,45","endDate":"","headline":"","text":"i guess what i\'m getting at is I hate lettuce. sorry salad, i love you, i\'m just not crazy about lettuce. lettuce is like sad bread","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/616999380785082368\/KbHDbGUL_normal.jpg"}},{"startDate":"2015,07,08,14,44,01","endDate":"","headline":"","text":"...it is their bullshit not yours...be true to yourself and be kind. They can\'t defeat you...only you can defeat u. It\'s all love","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/1601696494\/SCOOTER_b_w1_normal.jpg"}},{"startDate":"2015,07,08,14,43,57","endDate":"","headline":"","text":"Love you all sooooooo much! Night night!","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/589431063182610433\/n1Fkt_AV_normal.jpg"}},{"startDate":"2015,07,08,14,32,00","endDate":"","headline":"","text":"Temporarily falling in love with strangers in public places","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/591143235562569729\/eqjuTSic_normal.jpg"}},{"startDate":"2015,07,08,14,31,53","endDate":"","headline":"","text":"Ahhhh Mom and Dad y\'all are the best! I love you both with all of my heart. Wish u could be here. Best parents ever! So blessed @WeLuvAllyB","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/592754626585337856\/hF6SYqZQ_normal.jpg"}},{"startDate":"2015,07,08,14,29,18","endDate":"","headline":"","text":"MY DINAHHH YAAANNNEE!! Ahhhh girl. Thank you for bringing such joy to my heart. This was so sweet? I LOVE YOU FOREVER LIL SIS?? @dinahjane97","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/592754626585337856\/hF6SYqZQ_normal.jpg"}},{"startDate":"2015,07,08,14,25,01","endDate":"","headline":"","text":"Back on the grind .... I love you home ??until then ??","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/616062150445002752\/sYu5H3M1_normal.jpg"}},{"startDate":"2015,07,08,14,16,44","endDate":"","headline":"","text":"Aye! Much love babe :)  https:\/\/t.co\/55gsSJuM1u","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/609090791386927104\/r_xhYr4G_normal.jpg"}},{"startDate":"2015,07,08,13,26,35","endDate":"","headline":"","text":"SMALLZY!!! Thank you so much cutie pie! AHHHHH YOURE AMAZING!! I love yoooou!! Really really hope to see you soon! Miss u ?? @Smallzy","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/592754626585337856\/hF6SYqZQ_normal.jpg"}},{"startDate":"2015,07,08,13,06,49","endDate":"","headline":"","text":"#Happy1Yearof3AMEP can\'t believe it\'s been a year what a legendary year it has been.. I love you all so damn much https:\/\/t.co\/Ykt5KQ5fBo","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/614957532566544385\/mupVEZCz_normal.jpg"}},{"startDate":"2015,07,08,13,06,48","endDate":"","headline":"","text":"My phone is at 2% and I\'m not near a charger. Tell my family I love them.","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/590305718151970816\/kk7QHF2q_normal.jpg"}},{"startDate":"2015,07,08,12,50,35","endDate":"","headline":"","text":"I love Marshall ? #HIMYM http:\/\/t.co\/L5Ykhy5ngw","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/378800000275316533\/bb39ba415556e3f6108acc999b7d41c7_normal.jpeg"}},{"startDate":"2015,07,08,12,25,01","endDate":"","headline":"","text":"A hug means I need you.?  A kiss means I love you.?  A call means I miss you.?","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/587725883261132801\/siAInEBT_normal.jpg"}},{"startDate":"2015,07,08,12,15,53","endDate":"","headline":"","text":"Thanks to everyone for making this a special and memorable birthday for @AllyBrooke. We love y\'all. #HarmonizersRule http:\/\/t.co\/aY1Tks8gi8","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/3665274526\/79d425c5d5d788c8dd3af27465e70f79_normal.jpeg"}},{"startDate":"2015,07,08,11,45,34","endDate":"","headline":"","text":"If I do marry, I want it to be for love. ?Jasmine (Aladdin)","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/1175908443\/disneywordspp_normal.jpg"}},{"startDate":"2015,07,08,11,42,14","endDate":"","headline":"","text":"I love this band http:\/\/t.co\/preORjvhha","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/617756569573400576\/8pOHHM38_normal.jpg"}},{"startDate":"2015,07,08,11,30,44","endDate":"","headline":"","text":"Kisses to everyone. You are so kind in your birthday messages and I want y\'all to know that I LOVE YOU ?? http:\/\/t.co\/nHRlHtEWMi","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/592754626585337856\/hF6SYqZQ_normal.jpg"}},{"startDate":"2015,07,08,11,28,57","endDate":"","headline":"","text":"Cabana love ?? http:\/\/t.co\/weyhRG7sUl","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/592754626585337856\/hF6SYqZQ_normal.jpg"}},{"startDate":"2015,07,08,11,05,26","endDate":"","headline":"","text":"Happy Birthday Princess! Hope you had a wonderful day. We miss you! Thanks everyone for all the love for @AllyBrooke http:\/\/t.co\/BJwrg4XPt5","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/3665274526\/79d425c5d5d788c8dd3af27465e70f79_normal.jpeg"}},{"startDate":"2015,07,08,10,56,57","endDate":"","headline":"","text":"You\'re too kind haha :) thanks for the love and support. Means the world.  https:\/\/t.co\/SXSDObuu58","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/615591216705572864\/KCPca9oN_normal.jpg"}},{"startDate":"2015,07,08,10,41,30","endDate":"","headline":"","text":"i love OZ. be back soon. http:\/\/t.co\/yMx6D6LKQN","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/577690228221030400\/tOYvL7gL_normal.jpeg"}},{"startDate":"2015,07,08,10,12,55","endDate":"","headline":"","text":"MILEY CYRUS AND HER NEW GIRLFRIEND I AM IN LOVE http:\/\/t.co\/S5iaHjuUvV","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/378800000808361105\/05ee4e11ebe870ccbff48dd1c0b76078_normal.jpeg"}},{"startDate":"2015,07,08,10,08,15","endDate":"","headline":"","text":"@AllyBrooke Happy Birthday Sweetheart! I hope your day was a Blessed one! U have such an AMAZING spirit & U deserve the best! Love You?????","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/544599162424004608\/3UzGk3Ae_normal.jpeg"}},{"startDate":"2015,07,08,10,00,52","endDate":"","headline":"","text":"IF KOURTNEY KARDASHIAN AND SCOTT DISICK CANT MAKE IT THEN NO ONE CAN AND LOVE ISNT REAL","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/548735218212143104\/LW_uATYn_normal.jpeg"}},{"startDate":"2015,07,08,09,55,09","endDate":"","headline":"","text":"I would love to know why people think being discouraging gets them anywhere in life?","asset":{"media":"","credit":"","caption":"","thumbnail":"http:\/\/pbs.twimg.com\/profile_images\/602255005496795136\/1nakXrh1_normal.jpg"}}]}}';
		echo $timeline;
		//$this->ajaxReturn($timeline);
    }
}
?>