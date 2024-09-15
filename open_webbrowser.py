import subprocess
import multiprocessing
import time

# Hàm mở cửa sổ trình duyệt mới trên Windows
def open_browser(url):
    subprocess.Popen(['start', 'msedge', '--inprivate', '--new-window', url], shell=True)
    time.sleep(2)  # Đợi 2 giây giữa mỗi lần mở cửa sổ

# Danh sách các URL để mở
urls = [
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
    'https://www.youtube.com/watch?v=A5TKJTgdnYU',
]

if __name__ == "__main__":
    processes = []
    for url in urls:
        p = multiprocessing.Process(target=open_browser, args=(url,))
        p.start()
        processes.append(p)

    for p in processes:
        p.join()
