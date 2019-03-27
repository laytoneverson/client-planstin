# Git Procedures

**Code can only be added to the master branch through a PR. Never push to master and never merge to master locally.** 

## Rebasing Your Branch

    $ git checkout master
    $ git remote update
    $ git pull
    $ git checkout my-working-branch-needing-updated
    $ git rebase master  //Resolve any conflicts
    $ git rebase continue //Repeat until rebase is complete
    $ git push --force 
        //this is important! Do NOT git pull or git fetch until your 
        //rebase is complete and you have force pushed

