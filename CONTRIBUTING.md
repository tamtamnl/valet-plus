# Contribute to valet-plus
Want to help out valet-plus and the community? This document explains how to do so!

## Summary

* [Issues](#issues)
* [Pull Requests](#pull-requests)
* [Releases](#releases)
* [Changelog](#changelog)

## Issues

Before submitting any issues to the valet-plus issue queue follow the checklist below.


> _NOTE:_ If you do not follow this format your ticket could be closed without feedback!


Issue template
------
- [ ] I've checked the issue queue and could not anything similar to my issue/bug.
- [ ] I'm on the latest version of valet-plus.
- [ ] I've run `valet fix` and `valet install` after updating and before submitting my issue.
- [ ] I've run and included the output of `valet debug` in a separate text storage like Github Gists, Pastebin, Hastebin, etc...

**What is the problem?**  
A description of what you think the problem is.

**How do I reproduce this?**  
A step by step guide on how to reproduce this issue.

**What is the solution?**  
A description of the proposed solution.

## Pull Requests
The valet-plus team is always happy to spend some time on reviewing your pull requests.
However to make the process easier and more fluid please follow the following guidelines.

> _NOTE:_ If you do not follow these guidelines your pull request could be closed without feedback.

PR template
------

- [ ] I have formatted my code with the [PSR-2](http://www.php-fig.org/psr/psr-2/) coding style before submitting my PR.
- [ ] I have created an issue which accompanies my PR and is linked within in my PR.

**I have read the contribution guidelines and am targeting the branch <YOUR_TARGET_BRANCH> because:**  
Because this is a Bug Fix which is Backwards Compatible.  
Because this is a Feature which is not Back Compatible.  
Because this is a Deprecation which is Backwards Compatible.  
etc...  
  
### What branch to target?
  
Please use the following overview to determine what branch you need to target.  

Kind of modification | Backward Compatible (BC) | Type of release | Branch to target        
-------------------- | ------------------------ | --------------- | -----------------------
Bug fix              | Yes                      | Patch           | `1.x.x`                | 
Bug fix              | No (Only if no choice)   | Major           | `master`               | 
Feature              | Yes                      | Minor           | `1.x.x`                | 
Feature              | No (Only if no choice)   | Major           | `master`               | 
Deprecation          | Yes (Have to)            | Minor           | `1.x.x`                | 
Deprecation removal  | No (Can't be)            | Major           | `master`               | 

##  Releases

When creating a release the valet-plus team follows the following workflow.

- Create a release branch
- Update the version within `valet-plus/cli/valet.php` to match the release tag.
- Merge release branch to active branch to increment version number.
- Publish tag/release.

// INPUT NEEDED

## Changelog
Every project needs a changelog which easily shows what has changed in comparison to the previous changes.
As of valet-plus version 1.1.x valet-plus will be tracking changes in CHANGELOG.md.


