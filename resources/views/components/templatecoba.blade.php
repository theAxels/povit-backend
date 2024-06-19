<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap"
    />
  </head>
  <style>
    .all-icon {
  height: 86px;
  width: 88px;
  position: absolute;
  margin: 0 !important;
  bottom: 75px;
  left: 295px;
  object-fit: contain;
}
.close-side-bar-icon {
  height: 1024px;
  width: 105px;
  position: relative;
  object-fit: cover;
}
.send-to {
  text-decoration: none;
  height: 38px;
  position: relative;
  font-weight: 700;
  color: inherit;
  display: inline-block;
}
.send-to-wrapper {
  align-self: stretch;
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: center;
  padding: 0 var(--padding-xl) 17px 60px;
}
.one-team-header-child {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.star-duotone-icon {
  position: absolute;
  width: calc(100% - 28px);
  top: 15px;
  right: 14px;
  left: 14px;
  max-width: 100%;
  overflow: hidden;
  height: 55px;
  z-index: 1;
}
.camera-icon,
.one-team-header {
  position: absolute;
  top: 765px;
  left: 517px;
  width: 88px;
  height: 86px;
}
.camera-icon {
  width: 100%;
  height: 714px;
  margin: 0 !important;
  top: 0;
  right: 0;
  left: 0;
  max-width: 100%;
  overflow: hidden;
  flex-shrink: 0;
  object-fit: cover;
}
.close-round-fill-icon {
  width: 69px;
  height: 66px;
  position: relative;
  object-fit: cover;
  cursor: pointer;
  z-index: 1;
}
.message-field-child {
  height: 40px;
  width: 40px;
  position: relative;
  min-height: 40px;
  z-index: 1;
}
.message-input-child {
  height: 45px;
  width: 278px;
  position: absolute;
  margin: 0 !important;
  bottom: -13px;
  left: -36px;
  border-radius: 20px;
  z-index: 1;
}
.add-a-message {
  height: 34px;
  position: relative;
  display: inline-block;
  z-index: 2;
}
.message-input {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  position: relative;
}
.message-field-item {
  height: 40px;
  width: 40px;
  position: relative;
  min-height: 40px;
  z-index: 1;
}
.message-field {
  align-self: stretch;
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: space-between;
  gap: var(--gap-xl);
}
.send-to-icon {
  height: 120px;
  width: 125px;
  position: relative;
  object-fit: cover;
  z-index: 1;
}
.send-to-button-container {
  align-self: stretch;
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: center;
  padding: 0 var(--padding-2xl) 0 var(--padding-xl);
}
.one-team-message-input {
  width: 408px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  gap: 16px;
  max-width: 100%;
}
.one-team,
.one-team-message {
  display: flex;
  align-items: flex-start;
  box-sizing: border-box;
  max-width: 100%;
}
.one-team-message {
  align-self: stretch;
  flex-direction: row;
  justify-content: center;
  padding: 0 var(--padding-xl) 0 var(--padding-2xl);
}
.one-team {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  flex-direction: column;
  justify-content: flex-start;
  padding: 18px 33px 0;
  gap: 508px;
  z-index: 1;
}
.one-team-header-parent {
  align-self: stretch;
  height: 851px;
  position: relative;
  max-width: 100%;
  font-size: 23px;
  color: var(--color-white);
}
.all,
.close-friend {
  height: 38px;
  width: 52px;
  position: relative;
  font-weight: 700;
  display: inline-block;
  flex-shrink: 0;
}
.close-friend {
  height: 43px;
  width: 163px;
}
.close-friend-option {
  width: 519px;
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: space-between;
  gap: var(--gap-xl);
  max-width: 100%;
}
.close-friend-option-wrapper,
.frame-parent {
  align-self: stretch;
  display: flex;
  align-items: flex-start;
  max-width: 100%;
}
.close-friend-option-wrapper {
  flex-direction: row;
  justify-content: center;
  padding: 0 var(--padding-xl) 0 68px;
  box-sizing: border-box;
}
.frame-parent {
  flex-direction: column;
  justify-content: flex-start;
}
.content-header-child,
.sidebar {
  box-sizing: border-box;
  max-width: 100%;
}
.sidebar {
  width: 727px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: 41px 0 0;
}
.content-header-child {
  width: 376px;
  height: 676px;
  position: relative;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: var(--br-21xl);
  background-color: var(--color-white);
  border: 1px solid var(--color-plum);
  display: none;
}
.fa-soliduser-friends-icon {
  height: 29px;
  width: 37px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
  z-index: 1;
}
.your-friends {
  text-decoration: none;
  position: relative;
  font-weight: 700;
  color: inherit;
  text-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  z-index: 1;
}
.your-friends-label {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  gap: var(--gap-xs);
}
.friends {
  width: 82px;
  position: relative;
  font-size: var(--font-size-base);
  font-weight: 500;
  font-family: var(--font-poppins);
  display: inline-block;
  text-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  z-index: 2;
}
.your-friends-header,
.your-friends-header-wrapper {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
}
.your-friends-header-wrapper {
  flex-direction: row;
  padding: 0 22px;
  font-size: 28px;
}
.search-field-child {
  height: 44px;
  width: 338px;
  position: relative;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: var(--br-31xl);
  background-color: var(--color-plum);
  display: none;
  max-width: 100%;
}
.search-icon {
  width: 18px;
  height: 17px;
  position: relative;
  z-index: 2;
}
.search-input {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: var(--padding-8xs) 0 0;
}
.search-contact {
  width: 141px;
  position: relative;
  display: inline-block;
  text-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  z-index: 2;
}
.search-field,
.search-field-wrapper {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  box-sizing: border-box;
  max-width: 100%;
}
.search-field {
  flex: 1;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: var(--br-31xl);
  background-color: var(--color-plum);
  justify-content: center;
  padding: 9px var(--padding-xl) var(--padding-5xs);
  gap: var(--gap-xs);
  z-index: 1;
}
.search-field-wrapper {
  align-self: stretch;
  justify-content: flex-start;
  padding: 0 14px 0 var(--padding-6xs);
  font-size: var(--font-size-lg);
  font-family: var(--font-poppins);
}
.teman-def-child {
  height: 100%;
  width: 55px;
  position: absolute;
  margin: 0 !important;
  top: 0;
  bottom: 0;
  left: 0;
  max-height: 100%;
}
.teman-def-item {
  height: 45px;
  width: 45px;
  position: relative;
  object-fit: cover;
  z-index: 1;
}
.piooos-dump {
  position: relative;
  font-weight: 700;
}
.contact-name-container,
.teman-def {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: var(--padding-7xs) 0 0;
}
.teman-def {
  flex: 1;
  flex-direction: row;
  padding: var(--padding-8xs) 0 var(--padding-8xs) var(--padding-8xs);
  position: relative;
  gap: var(--gap-11xl);
}
.basilcross-solid-icon,
.humbleiconschat {
  height: 35px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
  min-height: 35px;
}
.humbleiconschat {
  width: 37px;
  z-index: 1;
}
.basilcross-solid-icon {
  width: 40px;
}
.chat-icon-container,
.chat-icons,
.contact-item {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
}
.chat-icon-container,
.contact-item {
  flex-direction: column;
  padding: var(--padding-6xs) 0 0;
}
.contact-item {
  align-self: stretch;
  flex-direction: row;
  padding: 0 var(--padding-12xs) var(--padding-3xs) 0;
  gap: 38px;
  flex-shrink: 0;
  debug_commit: 69da668;
}
.teman-def-inner {
  height: 100%;
  width: 55px;
  position: absolute;
  margin: 0 !important;
  top: 0;
  bottom: 0;
  left: 0;
  max-height: 100%;
}
.ellipse-icon {
  height: 45px;
  width: 45px;
  position: relative;
  object-fit: cover;
  z-index: 1;
}
.piooos-dump1 {
  position: relative;
  font-weight: 700;
}
.piooos-dump-wrapper,
.teman-def1 {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: var(--padding-7xs) 0 0;
}
.teman-def1 {
  align-self: stretch;
  flex-direction: row;
  padding: var(--padding-8xs) 0 var(--padding-8xs) var(--padding-8xs);
  position: relative;
  gap: var(--gap-11xl);
}
.teman-def-child1 {
  height: 100%;
  width: 55px;
  position: absolute;
  margin: 0 !important;
  top: 0;
  bottom: 0;
  left: 0;
  max-height: 100%;
}
.teman-def-child2 {
  height: 45px;
  width: 45px;
  position: relative;
  object-fit: cover;
  z-index: 1;
}
.piooos-dump2 {
  position: relative;
  font-weight: 700;
}
.piooos-dump-container,
.teman-def2 {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: var(--padding-7xs) 0 0;
}
.teman-def2 {
  align-self: stretch;
  flex-direction: row;
  padding: var(--padding-8xs) 0 var(--padding-8xs) var(--padding-8xs);
  position: relative;
  gap: var(--gap-11xl);
}
.frame-child,
.frame-item {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.frame-item {
  top: 5px;
  left: 5px;
  width: 45px;
  height: 45px;
  object-fit: cover;
}
.vector-parent {
  height: 55px;
  width: 55px;
  position: relative;
}
.piooos-dump3 {
  align-self: stretch;
  height: 27px;
  position: relative;
  font-weight: 700;
  display: inline-block;
}
.piooos-dump-frame {
  flex: 1;
  flex-direction: column;
  padding: var(--padding-2xs) 0 0;
}
.contact-list-items,
.piooos-dump-frame,
.teman-def3 {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
}
.teman-def3 {
  align-self: stretch;
  flex-direction: row;
  gap: 25px;
}
.contact-list-items {
  flex: 1;
  flex-direction: column;
  gap: var(--gap-xl);
}
.basilcross-solid-icon1,
.humbleiconschat1 {
  height: 35px;
  width: 37px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
  min-height: 35px;
}
.basilcross-solid-icon1 {
  width: 40px;
}
.chat-icons-duplicate {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  gap: 1px;
}
.humbleiconschat2 {
  height: 35px;
  width: 37px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
  z-index: 1;
}
.basilcross-solid-icon2,
.basilcross-solid-icon3 {
  width: 40px;
  height: 35px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
}
.chat-icon-column,
.double-chat-icons,
.single-chat-icon {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
}
.double-chat-icons {
  flex-direction: column;
  gap: var(--gap-21xl);
}
.chat-icon-column,
.single-chat-icon {
  flex-direction: row;
}
.chat-icon-column {
  flex-direction: column;
  align-items: flex-end;
  gap: var(--gap-21xl);
}
.chat-icon-column-wrapper,
.contact-list-items-parent {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: var(--padding-6xs) 0 0;
}
.contact-list-items-parent {
  align-self: stretch;
  flex-direction: row;
  padding: 0 var(--padding-12xs) 0 0;
  gap: 37px;
  flex-shrink: 0;
  debug_commit: 69da668;
}
.frame-inner {
  align-self: stretch;
  height: 1px;
  position: relative;
  border-top: 1px solid var(--color-gray);
  box-sizing: border-box;
}
.teman-def-child3 {
  height: 100%;
  width: 55px;
  position: absolute;
  margin: 0 !important;
  top: 0;
  bottom: 0;
  left: 0;
  max-height: 100%;
}
.teman-def-child4 {
  height: 45px;
  width: 45px;
  position: relative;
  object-fit: cover;
  z-index: 1;
}
.piooos-dump4 {
  align-self: stretch;
  height: 27px;
  position: relative;
  font-weight: 700;
  display: inline-block;
}
.last-contact-name-container,
.teman-def4 {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
}
.last-contact-name-container {
  flex: 1;
  flex-direction: column;
  padding: var(--padding-7xs) 0 0;
}
.teman-def4 {
  width: 223px;
  flex-direction: row;
  padding: var(--padding-8xs) 0 var(--padding-8xs) var(--padding-8xs);
  box-sizing: border-box;
  position: relative;
  gap: var(--gap-11xl);
}
.basilcross-solid-icon4 {
  width: 40px;
  height: 35px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
}
.last-contact,
.last-contact-icon {
  display: flex;
  align-items: flex-start;
}
.last-contact-icon {
  flex-direction: column;
  justify-content: flex-start;
  padding: var(--padding-6xs) 0 0;
}
.last-contact {
  align-self: stretch;
  flex-direction: row;
  justify-content: space-between;
  gap: var(--gap-xl);
}
.line-div {
  align-self: stretch;
  height: 1px;
  position: relative;
  border-top: 1px solid var(--color-gray);
  box-sizing: border-box;
}
.component-2,
.line-parent {
  align-self: stretch;
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
}
.line-parent {
  padding: 0 var(--padding-12xs) 0 0;
  gap: 9.5px;
  debug_commit: 69da668;
}
.component-2 {
  height: 236px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  overflow: hidden;
  padding: var(--padding-2xs) var(--padding-3xs) 170px;
  box-sizing: border-box;
  gap: 10px;
  cursor: pointer;
  z-index: 1;
}
.friend-requests {
  flex: 1;
  position: relative;
  font-weight: 500;
  text-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  z-index: 1;
}
.friend-requests-wrapper {
  width: 140px;
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  padding: 0 var(--padding-7xs) var(--padding-8xs);
  box-sizing: border-box;
  font-size: var(--font-size-base);
  font-family: var(--font-poppins);
}
.header-icons-child {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.header-icons-item {
  position: absolute;
  top: 5px;
  left: 5px;
  width: 45px;
  height: 45px;
  object-fit: cover;
  z-index: 2;
}
.header-icons {
  height: 55px;
  width: 55px;
  position: relative;
}
.piooos-dump5 {
  position: relative;
  font-weight: 700;
  z-index: 1;
}
.frame-div {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: var(--padding-xs) 0 0;
}
.friend-background {
  position: absolute;
  top: 0;
  left: 0;
  border-radius: var(--br-11xl);
  background-color: var(--color-dodgerblue);
  width: 46px;
  height: 23px;
  z-index: 1;
}
.acc {
  position: absolute;
  top: 3px;
  left: 6px;
  font-weight: 700;
  display: inline-block;
  width: 43px;
  height: 24px;
  z-index: 2;
}
.friend-info {
  align-self: stretch;
  height: 27px;
  position: relative;
}
.friend-row {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-end;
  padding: 0 0 var(--padding-11xs);
}
.basilcross-solid-icon5 {
  height: 35px;
  width: 40px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
  z-index: 3;
}
.friend-column {
  align-self: stretch;
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  justify-content: flex-start;
}
.friend-column-wrapper,
.header-column,
.header-column-wrapper {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
}
.friend-column-wrapper {
  width: 89px;
  flex-direction: column;
  padding: var(--padding-3xs) 0 0;
  box-sizing: border-box;
  font-size: var(--font-size-sm);
  color: var(--color-white);
}
.header-column,
.header-column-wrapper {
  flex-direction: row;
  max-width: 100%;
}
.header-column {
  flex: 1;
  gap: var(--gap-8xl);
}
.header-column-wrapper {
  align-self: stretch;
  padding: 0 var(--padding-5xs) var(--padding-8xs) var(--padding-3xs);
  box-sizing: border-box;
}
.frame-child1,
.frame-child2 {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.frame-child2 {
  top: 5px;
  left: 5px;
  width: 45px;
  height: 45px;
  object-fit: cover;
  z-index: 2;
}
.vector-group {
  height: 55px;
  width: 55px;
  position: relative;
}
.piooos-dump6 {
  position: relative;
  font-weight: 700;
  z-index: 1;
}
.piooos-dump-wrapper1 {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: var(--padding-xs) 0 0;
}
.rectangle-div {
  position: absolute;
  top: 0;
  left: 0;
  border-radius: var(--br-11xl);
  background-color: var(--color-dodgerblue);
  width: 46px;
  height: 23px;
  z-index: 1;
}
.acc1 {
  position: absolute;
  top: 3px;
  left: 6px;
  font-weight: 700;
  display: inline-block;
  width: 43px;
  height: 24px;
  z-index: 2;
}
.rectangle-parent {
  align-self: stretch;
  height: 27px;
  position: relative;
}
.frame-wrapper1 {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-end;
  padding: 0 0 var(--padding-11xs);
}
.basilcross-solid-icon6 {
  height: 35px;
  width: 40px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
  z-index: 3;
}
.frame-container {
  align-self: stretch;
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  justify-content: flex-start;
}
.content-header-inner,
.frame-group,
.frame-wrapper {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
}
.frame-wrapper {
  width: 89px;
  flex-direction: column;
  padding: var(--padding-3xs) 0 0;
  box-sizing: border-box;
  font-size: var(--font-size-sm);
  color: var(--color-white);
}
.content-header-inner,
.frame-group {
  flex-direction: row;
  max-width: 100%;
}
.frame-group {
  flex: 1;
  gap: var(--gap-8xl);
}
.content-header-inner {
  align-self: stretch;
  padding: 0 var(--padding-5xs) var(--padding-9xs) var(--padding-3xs);
  box-sizing: border-box;
}
.frame-child3,
.frame-child4 {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.frame-child4 {
  top: 5px;
  left: 5px;
  width: 45px;
  height: 45px;
  object-fit: cover;
  z-index: 2;
}
.vector-container {
  height: 55px;
  width: 55px;
  position: relative;
}
.piooos-dump7 {
  position: relative;
  font-weight: 700;
  z-index: 1;
}
.piooos-dump-wrapper2 {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  padding: var(--padding-xs) 0 0;
}
.frame-child5 {
  position: absolute;
  top: 0;
  left: 0;
  border-radius: var(--br-11xl);
  background-color: var(--color-dodgerblue);
  width: 46px;
  height: 23px;
  z-index: 1;
}
.acc2 {
  position: absolute;
  top: 3px;
  left: 6px;
  font-weight: 700;
  display: inline-block;
  width: 43px;
  height: 24px;
  z-index: 2;
}
.rectangle-group {
  align-self: stretch;
  height: 27px;
  position: relative;
}
.frame-wrapper3 {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-end;
  padding: 0 0 var(--padding-11xs);
}
.basilcross-solid-icon7 {
  height: 35px;
  width: 40px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
  z-index: 3;
}
.frame-parent2 {
  align-self: stretch;
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  justify-content: flex-start;
}
.frame-parent1,
.frame-wrapper2 {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
}
.frame-wrapper2 {
  width: 89px;
  flex-direction: column;
  padding: var(--padding-3xs) 0 0;
  box-sizing: border-box;
  font-size: var(--font-size-sm);
  color: var(--color-white);
}
.frame-parent1 {
  flex: 1;
  flex-direction: row;
  gap: var(--gap-8xl);
  max-width: 100%;
}
.content-header,
.content-header-inner1 {
  align-self: stretch;
  box-sizing: border-box;
  max-width: 100%;
}
.content-header-inner1 {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  padding: 0 var(--padding-5xs) 0 var(--padding-3xs);
}
.content-header {
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: var(--br-21xl);
  background-color: var(--color-white);
  border: 1px solid var(--color-plum);
  flex-direction: column;
  padding: var(--padding-8xl) var(--padding-9xs) 32px var(--padding-2xs);
  gap: var(--gap-xs);
}
.content,
.content-header,
.dashboard-foto {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
}
.content {
  width: 376px;
  flex-direction: column;
  padding: 101px 0 0;
  box-sizing: border-box;
  max-width: 100%;
  font-size: var(--font-size-3xl);
  font-family: var(--font-inter);
}
.dashboard-foto {
  width: 100%;
  position: relative;
  background-color: var(--color-white);
  overflow: hidden;
  flex-direction: row;
  gap: 88px;
  line-height: normal;
  letter-spacing: normal;
  text-align: left;
  font-size: var(--font-size-6xl);
  color: var(--color-black);
  font-family: var(--font-poppins);
}
@media screen and (max-width: 1325px) {
  .dashboard-foto {
    flex-wrap: wrap;
  }
}
@media screen and (max-width: 1125px) {
  .sidebar {
    padding-top: var(--padding-8xl);
    box-sizing: border-box;
  }
}
@media screen and (max-width: 800px) {
  .one-team {
    gap: 254px;
  }
  .close-friend-option-wrapper {
    padding-left: 34px;
    box-sizing: border-box;
  }
  .component-2,
  .content-header,
  .sidebar {
    padding-top: var(--padding-xl);
    box-sizing: border-box;
  }
  .component-2 {
    padding-bottom: 110px;
  }
  .content-header {
    padding-bottom: var(--padding-2xl);
  }
  .content {
    padding-top: 66px;
    box-sizing: border-box;
  }
  .dashboard-foto {
    gap: 44px;
  }
}
@media screen and (max-width: 450px) {
  .send-to {
    font-size: var(--font-size-xl);
  }
  .add-a-message {
    font-size: var(--font-size-lg);
  }
  .message-field {
    flex-wrap: wrap;
  }
  .one-team {
    gap: 127px;
  }
  .one-team-header-parent {
    height: auto;
    min-height: 851;
  }
  .all,
  .close-friend {
    font-size: var(--font-size-xl);
  }
  .close-friend-option {
    flex-wrap: wrap;
  }
  .your-friends {
    font-size: var(--font-size-3xl);
  }
  .piooos-dump {
    font-size: var(--font-size-lg);
  }
  .contact-item {
    gap: 19px;
  }
  .piooos-dump1,
  .piooos-dump2,
  .piooos-dump3 {
    font-size: var(--font-size-lg);
  }
  .contact-list-items-parent {
    gap: 18px;
  }
  .piooos-dump4,
  .piooos-dump5,
  .piooos-dump6,
  .piooos-dump7 {
    font-size: var(--font-size-lg);
  }
  .content {
    padding-top: 43px;
    box-sizing: border-box;
  }
  .dashboard-foto {
    gap: 22px;
  }
  body {
  margin: 0;
  line-height: normal;
}

:root {
  /* fonts */
  --font-inter: Inter;
  --font-poppins: Poppins;

  /* font sizes */
  --font-size-sm: 14px;
  --font-size-3xl: 22px;
  --font-size-lg: 18px;
  --font-size-base: 16px;
  --font-size-6xl: 25px;
  --font-size-xl: 20px;

  /* Colors */
  --color-white: #fff;
  --color-plum: #efbdee;
  --color-dodgerblue: #0d99ff;
  --color-black: #000;
  --color-gray: rgba(0, 0, 0, 0.56);

  /* Gaps */
  --gap-xs: 12px;
  --gap-8xl: 27px;
  --gap-xl: 20px;
  --gap-11xl: 30px;
  --gap-21xl: 40px;

  /* Paddings */
  --padding-8xl: 27px;
  --padding-9xs: 4px;
  --padding-2xs: 11px;
  --padding-xl: 20px;
  --padding-2xl: 21px;
  --padding-5xs: 8px;
  --padding-3xs: 10px;
  --padding-11xs: 2px;
  --padding-xs: 12px;
  --padding-8xs: 5px;
  --padding-7xs: 6px;
  --padding-12xs: 1px;
  --padding-6xs: 7px;

  /* Border radiuses */
  --br-21xl: 40px;
  --br-11xl: 30px;
  --br-31xl: 50px;
}
  </style>
  <body>
    <div class="dashboard-foto">
      <img class="all-icon" loading="lazy" alt="" src="./public/all@2x.png" />

      <img
        class="close-side-bar-icon"
        alt=""
        src="./public/close-sidebar@2x.png"
      />

      <div class="sidebar">
        <div class="frame-parent">
          <div class="send-to-wrapper">
            <a class="send-to">Send to...</a>
          </div>
          <div class="one-team-header-parent">
            <div class="one-team-header">
              <img
                class="one-team-header-child"
                alt=""
                src="./public/group-47@2x.png"
              />

              <img
                class="star-duotone-icon"
                loading="lazy"
                alt=""
                src="./public/star-duotone.svg"
              />
            </div>
            <div class="one-team">
              <img class="camera-icon" alt="" src="./public/camera@2x.png" />

              <img
                class="close-round-fill-icon"
                loading="lazy"
                alt=""
                src="./public/close-round-fill@2x.png"
                id="closeRoundFillImage"
              />

              <div class="one-team-message">
                <div class="one-team-message-input">
                  <div class="message-field">
                    <img
                      class="message-field-child"
                      loading="lazy"
                      alt=""
                      src="./public/group-70.svg"
                    />

                    <div class="message-input">
                      <img
                        class="message-input-child"
                        loading="lazy"
                        alt=""
                        src="./public/rectangle-3997.svg"
                      />

                      <b class="add-a-message">Add a message...</b>
                    </div>
                    <img
                      class="message-field-item"
                      loading="lazy"
                      alt=""
                      src="./public/group-71.svg"
                    />
                  </div>
                  <div class="send-to-button-container">
                    <img
                      class="send-to-icon"
                      loading="lazy"
                      alt=""
                      src="./public/send-to@2x.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="close-friend-option-wrapper">
            <div class="close-friend-option">
              <b class="all">All</b>
              <b class="close-friend">Close friend</b>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="content-header">
          <div class="content-header-child"></div>
          <div class="your-friends-header-wrapper">
            <div class="your-friends-header">
              <div class="your-friends-label">
                <img
                  class="fa-soliduser-friends-icon"
                  loading="lazy"
                  alt=""
                  src="./public/fasoliduserfriends.svg"
                />

                <a class="your-friends">Your Friends</a>
              </div>
              <div class="friends">20 Friends</div>
            </div>
          </div>
          <div class="search-field-wrapper">
            <div class="search-field">
              <div class="search-field-child"></div>
              <div class="search-input">
                <img
                  class="search-icon"
                  loading="lazy"
                  alt=""
                  src="./public/vector.svg"
                />
              </div>
              <div class="search-contact">Search Contact</div>
            </div>
          </div>
          <div class="component-2" id="component2Container">
            <div class="contact-item">
              <div class="teman-def">
                <img
                  class="teman-def-child"
                  alt=""
                  src="./public/ellipse-17.svg"
                />

                <img
                  class="teman-def-item"
                  alt=""
                  src="./public/ellipse-16@2x.png"
                />

                <div class="contact-name-container">
                  <b class="piooos-dump">piooo’s dump</b>
                </div>
              </div>
              <div class="chat-icon-container">
                <div class="chat-icons">
                  <img
                    class="humbleiconschat"
                    loading="lazy"
                    alt=""
                    src="./public/humbleiconschat.svg"
                  />

                  <img
                    class="basilcross-solid-icon"
                    loading="lazy"
                    alt=""
                    src="./public/basilcrosssolid.svg"
                  />
                </div>
              </div>
            </div>
            <div class="contact-list-items-parent">
              <div class="contact-list-items">
                <div class="teman-def1">
                  <img
                    class="teman-def-inner"
                    alt=""
                    src="./public/ellipse-17-1.svg"
                  />

                  <img
                    class="ellipse-icon"
                    alt=""
                    src="./public/ellipse-16-1@2x.png"
                  />

                  <div class="piooos-dump-wrapper">
                    <b class="piooos-dump1">piooo’s dump</b>
                  </div>
                </div>
                <div class="teman-def2">
                  <img
                    class="teman-def-child1"
                    alt=""
                    src="./public/ellipse-17-2.svg"
                  />

                  <img
                    class="teman-def-child2"
                    alt=""
                    src="{{ url("/public/ellipse-16-2@2x.png") }}"
                  />

                  <div class="piooos-dump-container">
                    <b class="piooos-dump2">piooo’s dump</b>
                  </div>
                </div>
                <div class="teman-def3">
                  <div class="vector-parent">
                    <img
                      class="frame-child"
                      alt=""
                      src="./public/ellipse-17-3.svg"
                    />

                    <img
                      class="frame-item"
                      loading="lazy"
                      alt=""
                      src="./public/ellipse-16-3@2x.png"
                    />
                  </div>
                  <div class="piooos-dump-frame">
                    <b class="piooos-dump3">piooo’s dump</b>
                  </div>
                </div>
              </div>
              <div class="chat-icon-column-wrapper">
                <div class="chat-icon-column">
                  <div class="chat-icons-duplicate">
                    <img
                      class="humbleiconschat1"
                      loading="lazy"
                      alt=""
                      src="./public/humbleiconschat-1.svg"
                    />

                    <img
                      class="basilcross-solid-icon1"
                      loading="lazy"
                      alt=""
                      src="./public/basilcrosssolid-1.svg"
                    />
                  </div>
                  <div class="single-chat-icon">
                    <img
                      class="humbleiconschat2"
                      alt=""
                      src="./public/humbleiconschat-2.svg"
                    />

                    <div class="double-chat-icons">
                      <img
                        class="basilcross-solid-icon2"
                        loading="lazy"
                        alt=""
                        src="./public/basilcrosssolid-2.svg"
                      />

                      <img
                        class="basilcross-solid-icon3"
                        loading="lazy"
                        alt=""
                        src="./public/basilcrosssolid-3.svg"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="line-parent">
              <div class="frame-inner"></div>
              <div class="last-contact">
                <div class="teman-def4">
                  <img
                    class="teman-def-child3"
                    alt=""
                    src="./public/ellipse-17-4.svg"
                  />

                  <img
                    class="teman-def-child4"
                    alt=""
                    src="./public/ellipse-16-4@2x.png"
                  />

                  <div class="last-contact-name-container">
                    <b class="piooos-dump4">piooo’s dump</b>
                  </div>
                </div>
                <div class="last-contact-icon">
                  <img
                    class="basilcross-solid-icon4"
                    alt=""
                    src="./public/basilcrosssolid-4.svg"
                  />
                </div>
              </div>
              <div class="line-div"></div>
            </div>
          </div>
          <div class="friend-requests-wrapper">
            <div class="friend-requests">Friend Requests</div>
          </div>
          <div class="header-column-wrapper">
            <div class="header-column">
              <div class="header-icons">
                <img
                  class="header-icons-child"
                  alt=""
                  src="./public/ellipse-17-5.svg"
                />

                <img
                  class="header-icons-item"
                  alt=""
                  src="./public/ellipse-16-5@2x.png"
                />
              </div>
              <div class="frame-div">
                <b class="piooos-dump5">piooo’s dump</b>
              </div>
              <div class="friend-column-wrapper">
                <div class="friend-column">
                  <div class="friend-row">
                    <div class="friend-info">
                      <div class="friend-background"></div>
                      <b class="acc">ACC</b>
                    </div>
                  </div>
                  <img
                    class="basilcross-solid-icon5"
                    loading="lazy"
                    alt=""
                    src="./public/basilcrosssolid-5.svg"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="content-header-inner">
            <div class="frame-group">
              <div class="vector-group">
                <img
                  class="frame-child1"
                  alt=""
                  src="./public/ellipse-17-6.svg"
                />

                <img
                  class="frame-child2"
                  alt=""
                  src="./public/ellipse-16-6@2x.png"
                />
              </div>
              <div class="piooos-dump-wrapper1">
                <b class="piooos-dump6">piooo’s dump</b>
              </div>
              <div class="frame-wrapper">
                <div class="frame-container">
                  <div class="frame-wrapper1">
                    <div class="rectangle-parent">
                      <div class="rectangle-div"></div>
                      <b class="acc1">ACC</b>
                    </div>
                  </div>
                  <img
                    class="basilcross-solid-icon6"
                    loading="lazy"
                    alt=""
                    src="./public/basilcrosssolid-6.svg"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="content-header-inner1">
            <div class="frame-parent1">
              <div class="vector-container">
                <img
                  class="frame-child3"
                  alt=""
                  src="./public/ellipse-17-7.svg"
                />

                <img
                  class="frame-child4"
                  alt=""
                  src="./public/ellipse-16-7@2x.png"
                />
              </div>
              <div class="piooos-dump-wrapper2">
                <b class="piooos-dump7">piooo’s dump</b>
              </div>
              <div class="frame-wrapper2">
                <div class="frame-parent2">
                  <div class="frame-wrapper3">
                    <div class="rectangle-group">
                      <div class="frame-child5"></div>
                      <b class="acc2">ACC</b>
                    </div>
                  </div>
                  <img
                    class="basilcross-solid-icon7"
                    loading="lazy"
                    alt=""
                    src="./public/basilcrosssolid-7.svg"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      var closeRoundFillImage = document.getElementById("closeRoundFillImage");
      if (closeRoundFillImage) {
        closeRoundFillImage.addEventListener("click", function (e) {
          // Please sync "Dashboard Awal" to the project
        });
      }

      var component2Container = document.getElementById("component2Container");
      if (component2Container) {
        component2Container.addEventListener("click", function (e) {
          // Please sync "Chat" to the project
        });
      }
      </script>
  </body>
