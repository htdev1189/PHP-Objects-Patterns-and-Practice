## Một số vấn đề về Git

Giả sử như cả 2 máy tính đều trỏ tới cùng 1 repo trên git
- máy A chưa push lên mà máy B đã có sửa đổi
    - thực hiện ( git add . ; git commit -m "message" ; và git push origin master ; trên máy B)
    - Máy A
        - Chưa thay đổi gì (workspace sạch, không có gì trong git status)
            - git pull origin master
        - Có thay đổi nhưng chưa commit (code mới chỉ nằm ở working directory hoặc staged nhưng chưa commit)
            - sử dụng ( git stash ) để cất giữ code đã commit
            - git pull origin master (kéo code trên repo về)
            - git stash pop (xử lý xung đột nếu có, -- chút am hiểm về VIM)
        - Đã commit nhưng chưa push (Lúc này local đã có commit, remote (máy công ty) cũng có commit.)
            - git pull --rebase origin main (Git sẽ lấy commit từ remote về, đặt commit ở nhà của bạn lên trên cùng.)
            - git add .
            - git rebase --continue
            - git push origin main