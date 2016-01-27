/**
 *
 * @param page ��ǰҳ
 * @param pages ��ҳ��
 * @param pageNum �����ʾ��ҳ����
 * @constructor
 */
function Pagination(page, pages,pageNum) {

    this.page = page;
    this.pages = pages;
    this.pageNum = pageNum;

}

/**
 * ����html
 */
Pagination.prototype.generate = function() {

    this.page = this.page<1?1:this.page;
    this.page = this.page>this.pages?this.pages:this.page;
    this.pages = this.pages<this.page?this.page:this.pages;

    //���㿪ʼҳ
    var start = this.page - Math.floor(this.pageNum/2);
    start = start<1?1:start;

    //�������ҳ
    var end = this.page + Math.floor(this.pageNum/2);
    end = end>this.pages?this.pages:end;

    var curPageNum = end - start + 1;

    //�����
    if(curPageNum<this.pageNum && start>1){
        start = start - (this.pageNum-curPageNum);
        start = start<1 ? 1 : start;
        curPageNum = end- start + 1;
    }
    //�ұߵ���
    if(curPageNum<this.pageNum && end<this.pages){
        end = end + (this.pageNum-curPageNum);
        end = end>this.pages? this.pages : end;
    }

    var output = '<div class="paganation_main">';

    if(start == 1){
        output += '<a class="left" href="###">��</a>';
    }else{
        output += '<a class="left" href="###">��</a>';
        output += '<a class="page-pre" href="###">&lt;</a>';
    }

    for(var i=start; i<=end; i++){
        if(i == this.page){
            output += '<a class="curr" href="###">'+i+'</a>';
        }else{
            output += '<a href="###">'+i+'</a>';
        }

    }

    if(this.page < end){
        output += '<a href="###" class="page-next">&gt;</a>';
        output += '<a class="right" href="###">��</a>';
    }else if(end == this.pages){
        output += '<a class="right" href="###">��</a>';
    }

    output += "</div>";

    return output;

}